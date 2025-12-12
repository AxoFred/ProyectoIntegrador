<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements CanResetPassword
{
    use Notifiable, CanResetPasswordTrait;

    // Nombre real de la tabla
    protected $table = 'usuarios';

    // Llave primaria real
    protected $primaryKey = 'ID_usuario';
    public $incrementing = true;
    protected $keyType = 'int';

    // Campos asignables
    protected $fillable = [
        'nombre',
        'Apaterno',
        'Amaterno',
        'correo',
        'password',
        'telefono',
        'estado',
        'ID_rol',
        'visible',
    ];

    // Campos ocultos
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * IMPORTANTE:
     * Laravel usa este método para saber cuál campo es el email.
     * Esto hace que Laravel deje de buscar la columna "email".
     */
public function getEmailForPasswordReset()
{
    return $this->correo;
}

    /**
     * Laravel usa esto para identificar el campo del login.
     */
    public function username()
    {
        return 'correo';
    }
}
