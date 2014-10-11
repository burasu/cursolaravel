<?php namespace HireMe\Managers;

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

        if ($validation->fails())
        {
            throw new ValidationException('Validation failed', $validation->messages());
        }
    }

    public function prepareData($data)
    {
        return $data;
    }


    public function save()
    {
        $this->isValid();

        $this->entity->fill($this->prepareData($this->data));
        $this->entity->save();

        return true;
    }

} 