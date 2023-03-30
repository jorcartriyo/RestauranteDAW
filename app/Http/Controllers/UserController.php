<?php

namespace App\Http\Controllers;

use App\Models\Model_has_roles;
use App\Models\Roles;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;
use Laravel\Telescope\Telescope;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $users, $rolesUser, $roles;

    public function __construct(User $users, Model_has_roles $rolesUser, Roles $roles)
    {
        $this->users = $users;
        $this->rolesUser = $rolesUser;
        $this->roles = $roles;
    }

    public function index()
    {

        $users = $this->users->obtenerUsuario();
        $roles = $this->roles->obtenerRol();
        $rolesUser = $this->rolesUser->obteneroles();
        Log::channel('baseroleslog')->info('Mostrada la pantalla de index');
        return view('users.index', ['users' => $users, 'roles' => $roles, 'rolesUser' => $rolesUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = $this->roles->obtenerRol();
        return view('users.register', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'password_confirmation' => ['required'],
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'rol'   => ['required'],
        ]);

        $file = $request->file;
        if ($file != null || isset($file)) {
            $file = $file;
            $fileName = time() . "." . $file->extension();
            Storage::putFileAs('avatar', $file, $fileName);
            Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('avatar/') . ' la imagen ' . $fileName);
        } else {
            Log::channel('baseroleslog')->info('El usuario a crear tiene una imagen por defecto ');

            $fileName = 'default';
        }

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'imagen' => $fileName,
        ])->assignRole($request->rol);

        if (!$user) {
            Log::channel('baseroleslog')->info('Error al crear usuario');
            return redirect(RouteServiceProvider::HOME)->with('warning', "Se ha producido un error al crear el usuario");
        }
        Log::channel('baseroleslog')->info('Usuario ' . $user->name . ' creado con exito' . $user);
        return redirect(RouteServiceProvider::HOME)->with('info', "Usuario creado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = $this->users->find($id);


        if (empty($user)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar un usuario que no existe');

            return redirect(route('home.index'))->with('warning', "No existe ese usuario");
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->users->obtenerUsuarioId($id);
        $rolesUser['name'] = [];
        if (empty($user)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de un usuario que no existe');
            return redirect(route('home.index'))->with('warning', "No existe ese usuario");
        } else {
            foreach ($user->roles as $rol) {
                $rolesUser['name'][] = $rol->name;
            }
            $roles = $this->roles->obtenerRol();
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $user->name);
        return view('users.edit')->with(['user' => $user, 'roles' => $roles, 'rolesUser' => $rolesUser]);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'file' => 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'rol'   => ['required'],
        ]);

        $ruta = '';
        $user = $this->users->obtenerUsuarioId($id);
        if (empty($user)) {
            Log::channel('baseroleslog')->alert('Intendo de editar un usuario que no existe');
            $ruta = redirect(route('home.index'))->with('warning', "No existe ese usuario");
        } else {
            $input = $request->all();
            $file = $request->file;
            if ($file != null || isset($file)) {
                $file = $file;
                $fileName = time() . "." . $file->extension();
                Storage::putFileAs('avatar', $file, $fileName);
                Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('avatar/') . ' la imagen ' . $fileName . ' para el usuario ' . $user->name);

                $input['imagen'] = $fileName = time() . "." . $file->extension();
                Storage::delete('avatar/' . $user->imagen);
                Storage::putFileAs('avatar', $file, $fileName);
            } else {
                $fileName = 'default';
            }
            $userUpdate = $user->update($input);
            if (isset($input['rol'])) {
                $this->rolesUser->deleterol($id);
                foreach ($input['rol'] as $rol) {
                    $user->assignRole($rol);
                    Log::channel('baseroleslog')->info('Asignados los roles de ' . $rol . ' al usuario ' . $user->name);
                }
            } else {
                Log::channel('baseroleslog')->info('error en la asignación de roles');
            }

            if (!$userUpdate) {
                Log::channel('baseroleslog')->warning('Error al actualizar datos del usuario ' . $user->name);

                $ruta = redirect(route('home.index'))->with('warning', "Se ha producido un error al actualizar el usuario");
            } else {
                Log::channel('baseroleslog')->info('Usuario ' . $user->name . ' actualizado con exito' . $user);

                $ruta = redirect(route('home.index'))->with('info', "Usuario actualizado con exito");
            }
        }

        return $ruta;
    }
    public function log()
    {
        return view('logs.index', [
            'cssFile' => Telescope::$useDarkTheme ? 'app-dark.css' : 'app.css',
            'telescopeScriptVariables' => Telescope::scriptVariables(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->users->obtenerUsuarioId($id);

        if (empty($user)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de borrado de un usuario que no existe');

            return redirect(route('home.index'))->with('warning', "No existe ese usuario");
        }
        Storage::delete('avatar/' . $user->imagen);
        Log::channel('baseroleslog')->info('Se ha borrado de la ruta  ' . Storage::url('avatar/') . ' la imagen del usuario ' . $user->name);
        $this->users->deleteUsuario($id);
        Log::channel('baseroleslog')->info('Usuario ' . $user->name . ' borrado con exito' . $user);
        return redirect(route('home.index'))->with('info', "Usuario borrado con exito");
    }
}
