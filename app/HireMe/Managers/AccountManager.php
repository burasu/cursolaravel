<?php namespace HireMe\Managers;

/**
 * Class AccountManager
 *
 * Manejador que se encargará de la edición de las cuentas de usuario
 *
 * @package HireMe\Managers
 */
class AccountManager extends BaseManager {

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

    public function prepareData($data)
    {
        $data['full_name'] = strip_tags($data['full_name']);    // Elimina etiquetas html y javascript del contenido

        return $data;
    }


} 