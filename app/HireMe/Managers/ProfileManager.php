<?php namespace HireMe\Managers;

/**
 * Class ProfileManager
 *
 * Manejador que se encargará de la edición de las cuentas de usuario
 *
 * @package HireMe\Managers
 */
class ProfileManager extends BaseManager {

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
            'email'     => 'required|email|unique:users,email,' . $this->entity->id,
            'password'  => 'confirmed',
            'password_confirmation' => ''
        ];


        return $rules;
    }


} 