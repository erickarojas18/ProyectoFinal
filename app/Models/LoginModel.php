<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'amigos';  // Nombre de la tabla
    protected $primaryKey = 'id';  // Columna de clave primaria
    protected $allowedFields = ['nombre', 'apellidos', 'email', 'telefono', 'direccion', 'pais', 'contraseña',
     'rol_id', 'estado_id', 'ultimo_inicio_sesion'];

    // Método para verificar usuario
    public function verificar_usuario($email, $contrasena)
    {
        // Busca al usuario por email y devuelve como un objeto
        $usuario = $this->where('email', $email)->first();

        // Verifica la contraseña (si está cifrada, usa password_verify)
        if ($usuario && password_verify($contrasena, $usuario['contraseña'])) {
            return (object)$usuario; // Devuelve el usuario como objeto
        }

        return null; // Devuelve null si las credenciales no coinciden
    }
}
