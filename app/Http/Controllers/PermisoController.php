<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;
use App\Models\Role_has_permissions;
use App\Models\Roles;
use Spatie\Permission\Models\Permission;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Log;



class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $permisos;
    protected $roles;
    protected $permisosRoles;
    public function __construct(Permissions $permisos, Roles $roles, Role_has_permissions $permisosRoles)
    {
        $this->permisos = $permisos;
        $this->roles = $roles;
        $this->permisosRoles = $permisosRoles;
    }

    public function index()
    {

        $permisos = $this->permisos->obtenerPermisos();
        $roles = $this->roles->obtenerRol();
        $permisosRoles = $this->permisosRoles->obtenerPermisos();
        Log::channel('baseroleslog')->info('Mostrada la pantalla de Permisos');

        return view('permisos.index', ['permisos' => $permisos, 'roles' => $roles, 'permisosRoles' => $permisosRoles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roles->obtenerRol();
        return view('permisos.register', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'roles' => 'required'
            ]
        );
        $roles = $request->roles;

        $permiso = Permission::create(
            [
                'name' => $request->name,
            ]
        );
        $permiso->syncRoles($roles);

        if (!$permiso) {
            Log::channel('baseroleslog')->info('Error al crear el permiso');
            return redirect(RouteServiceProvider::PERMISOS)->with('warning', "Se ha producido un error al crear el permiso");
        }
        Log::channel('baseroleslog')->info('Permiso ' . $permiso->name . ' creado con exito' . $permiso);

        return redirect(RouteServiceProvider::PERMISOS)->with('info', "Permiso creado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = $this->permisos->find($id);
        if (empty($permiso)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar un permiso que no existe');

            return redirect(route('permisos.index'))->with('warning', "No existe ese permiso");
        }

        return view('permisos.show')->with('permiso', $permiso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permiso = $this->permisos->obtenerPermisolID($id);
        $permisosRol['name'] = [];
        if (empty($permiso)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de un permiso que no existe');
            return redirect(route('permisos.index'))->with('warning', "No existe ese permiso");
        } else {
            foreach ($permiso->roles as $rol) {
                $permisosRol['name'][] = $rol->name;
            }
            $roles = $this->roles->obtenerRol();
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de permiso de ' . $permiso->name);
        return view('permisos.edit')->with(['permiso' => $permiso, 'roles' => $roles, 'permisosRol' => $permisosRol]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $request->validate(
            [
                'name' => 'required',
                'roles' => 'required'
            ]
        );

        $permiso = $this->permisos->obtenerPermisolID($id);
        if (empty($permiso)) {
            return redirect(route('permisos.index'))->with('warning', "No existe ese permiso");
        }
        $rolesUser = $request->roles;
        $input = $request->all();
        $permisoUpdate = $permiso->update($input);
        $permiso->syncRoles($rolesUser);
        if (!$permisoUpdate) {
            return redirect(route('permisos.index'))->with('warning', "Se ha producido un error al actualizar el permiso");;
        } else {
            return redirect(route('permisos.index'))->with('info', "Permiso actualizado con exito");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permisos->deletePermiso($id);
        return redirect(route('permisos.index'))->with('info', "Permiso borrado con exito");
    }
}
