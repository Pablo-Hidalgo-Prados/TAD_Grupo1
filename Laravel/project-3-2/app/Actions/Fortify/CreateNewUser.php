<?php

namespace App\Actions\Fortify;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'integer'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'imagen' => ['nullable', 'image', 'mimes:png,jpg', 'max:2048'],
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'apellidos' => $input['apellidos'],
            'telefono' => $input['telefono'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if (isset($input['imagen_perfil'])) {
            $img = $input['imagen_perfil'];
            $extension = $img->getClientOriginalExtension();
            $nombreImagen = $input['name'] . '_' . time() . '.' . $extension;
            $rutaImagen = $img->storeAs('user_profile', $nombreImagen, 'profile');
            $user->imagen = $rutaImagen;
            $user->save();
        }

        $carritoNuevo = new Carrito;
        $carritoNuevo->user_id = $user->id;
        $carritoNuevo->save();

        return $user;
    }
}