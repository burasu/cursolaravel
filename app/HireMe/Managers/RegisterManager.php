<?php

namespace HireMe\Managers;

/**
 * Class RegisterManager
 *
 * Manejador que se encargará del registro de los usuarios
 *
 * @package HireMe\Managers
 */
class RegisterManager extends BaseManager {

    /**
     * Método abstracto con el que obligamos a las diferentes entidades
     * definir sus reglas de validación.
     *
     * @return mixed
     */
    public function getRules()
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|confirmed',
            'password_confirmation' => 'required'
        ];


        return $rules;
    }


} 