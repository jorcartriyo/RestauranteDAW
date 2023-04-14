<?php

namespace App\Http\Controllers\SuperAdminRoles;

use Illuminate\Http\Request;
use App\Models\Roles;
use Spatie\Permission\Models\Role;
use App\Models\Role_has_permissions;
use App\Models\Permissions;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{ 
    protected $permisos;
    protected $roles;
    protected $permisosRoles;
    public function __construct(
        Roles $roles,
        Permissions $permisos,
        Role_has_permissions $permisosRoles
    ) {
        $this->roles = $roles;
        $this->permisos = $permisos;
        $this->permisosRoles = $permisosRoles;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roles->obtenerRol();


        $permisos = $this->permisos->obtenerPermisos();
        $permisosRoles = $this->permisosRoles->obtenerPermisos();
        Log::channel('baseroleslog')->info('Mostrada la pantalla de Roles');
        return view('roles.index', ['roles' => $roles, 'permisos' => $permisos, 'permisosRoles' => $permisosRoles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = $this->permisos->obtenerPermisos();
        return view('roles.register', ['permisos' => $permisos]);
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
                'permisos' => 'required'
            ]
        );

        $rol = Role::create(
            [
                'name' => $request->name

            ]
        );

        foreach ($request->permisos as $permiso) {
            $todosPermisos = $this->permisos->obtenerPermisos();
            foreach ($todosPermisos as $todos) {
                if ($permiso === $todos->name) {
                    $todos->syncRoles($rol);
                }
            }
        }

        if (!$rol) {
            Log::channel('baseroleslog')->info('Error al crear el rol');
            return redirect(RouteServiceProvider::ROLES)->with('warning', "Se ha producido un error al crear el rol");
        }
        Log::channel('baseroleslog')->info('Rol ' . $rol->name . ' creado con exito' . $rol);

        return redirect(RouteServiceProvider::ROLES)->with('info', "Rol creado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = $this->roles->find($id);
        if (empty($rol)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar un rol que no existe');

            return redirect(route('roles.index'))->with('warning', "No existe ese rol");
        }

        return view('roles.show')->with('rol', $rol);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = $this->roles->obtenerRolID($id);
        $rolPermisos['name'] = [];
        if (empty($rol)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de un rol que no existe');
            return redirect(route('roles.index'))->with('warning', "No existe ese rol");
        } else {
            foreach ($rol->permisos as $permiso) {
                $rolPermisos['name'][] = $permiso->name;
            }
            $permisos = $this->permisos->obtenerPermisos();
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $rol->name);
        return view('roles.edit')->with(['permisos' => $permisos, 'rol' => $rol, 'rolPermisos' => $rolPermisos]);
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
                'permisos' => 'required'
            ]
        );

        $rol = $this->roles->obtenerRolID($id);
        if (empty($rol)) {
            return redirect(route('roles.index'))->with('warning', "No existe ese rol");
        }

        $permisosUser = $request->permisos;

        $input = $request->all();
        $rolUpdate = $rol->update($input);
        $permisos = $this->permisos->obtenerPermisos();
        $r = $rol->name;
        foreach ($permisosUser as $permisoUser) {

            foreach ($permisos as $permiso) {
                if ($permiso->name ===  $permisoUser) {
                    $permiso->assignRole($rol->name);
                }
            }
        }


        if (!$rolUpdate) {
            return redirect(route('roles.index'))->with('warning', "Se ha producido un error al actualizar el rol");;
        } else {
            return redirect(route('roles.index'))->with('info', "Rol actualizado con exito");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function destroy($id)
    {
        $rol = $this->roles->findOrFail($id);
        if (empty($rol)) {
            return redirect(route('roles.index'))->with('warning', "No existe ese usuario");
        }
        $this->roles->deleteRol($id);
        return redirect(route('roles.index'))->with('info', "Usuario borrado con exito");
    }
}
