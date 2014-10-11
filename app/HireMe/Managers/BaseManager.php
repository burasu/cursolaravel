<?php

namespace HireMe\Managers;

/**
 * Class BaseManager
 *
 * Clase abstracta con la que gestionaremos las diferentes entidades
 * de la aplicación.
 *
 * @package HireMe\Managers
 */
abstract class BaseManager {

    protected $entity;
    protected $data;
    protected $errors;

    public function __construct($entity, $data)
    {
        $this->entity = $entity;
        $this->data   = array_only($data, array_keys($this->getRules()));
    }


    /**
     * Método abstracto con el que obligamos a las diferentes entidades
     * definir sus reglas de validación.
     *
     * @return mixed
     */
    abstract public function getRules();

    public function isValid()
    {
        $rules = $this->getRules();

        $validation = \Validator::make($this->data, $rules);

        $isValid = $validation->passes();
        $this->errors = $validation->messages();

        return $isValid;
    }

    public function save()
    {
        if ( ! $this->isValid())
        {
            return false;
        }

        $this->entity->fill($this->data);
        $this->entity->save();

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

} 