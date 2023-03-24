<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'imagen' => $request->imagen,
        ])->assignRole('Admin');
        if ($request->hasFile('image')) {
            if ($user->image != null) {
                Storage::disk('images_perfil')->delete($user->image->path);
                $user->image->delete();
            }

            $user->image()->create([
                'path' => $request->image->store('users', 'images_perfil')
            ]);
        }

        event(new Registered($user));

        Auth::login($user);
        Log::channel('baseroleslog')->info('Creado el usuario  ' . $user->name . ' con éxito ' . $user);

        return redirect(RouteServiceProvider::HOME);
    }
}
