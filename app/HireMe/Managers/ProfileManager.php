<?php namespace HireMe\Managers;

/**
 * Class ProfileManager
 *
 * Manejador que se encargará de la edición de los perfiles de usuarios
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
            'website_url' => 'required|url',
            'description' => 'required|max:1000',
            'job_type'    => 'required|in:full,partial,freelance',
            'category_id' => 'required|exists:categories,id',
            'available'   => 'in:1,0'
        ];


        return $rules;
    }

    public function prepareData($data)
    {
        if ( ! isset($data['available']))
        {
            $data['available'] = 0;
        }

        $this->entity->slug = \Str::slug($this->entity->user->full_name);

        return $data;
    }


} 