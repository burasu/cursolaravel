<?php

namespace HireMe\Components;


class FieldBuilder {

    protected $defaultClass = [
        'default'  => 'form-control',
        'checkbox' => ''
    ];

    public function getDefaultClass($type)
    {
        if (isset($this->defaultClass[$type]))
        {
            return $this->defaultClass[$type];
        }

        return $this->defaultClass['default'];
    }

    public function buildCssClasses($type, &$attributes)
    {
        $defaultClasses = $this->getDefaultClass($type);

        if (isset($attributes['class']))
        {
            $attributes['class'] .= ' ' . $defaultClasses;
        }
        else
        {
            $attributes['class'] = $defaultClasses;
        }
    }

    public function buildLabel($name)
    {
        if (\Lang::has('validation.attributes.' $name))
        {
            $label = \Lang::get('validation.attributes.' $name)
        }
        else
        {
            $label = str_replace('_', ' ', $name);
        }

        return ucfirst($label);
    }

    public function buildControl($type, $name, $value = null, $attributes = array(), $options = array())
    {
        switch ($type)
        {
            case 'select':
                return \Form::select($name, $options, $value, $attributes);
            case 'password':
                return \Form::password($name, $attributes);
            case 'checkbox':
                return \Form::checkbox($name);
            default:
                return \Form::text($type, $name, $value, $attributes);
        }
    }

    public function buildError($name)
    {
        $error = null;

        if (\Session::has('errors'))
        {
            $errors = \Session::get('errors');

            if ($errors->has($name))
            {
                $error = $errors->first($name);
            }
        }

        return $error;
    }

    public function buildTemplate($type)
    {
        if (\File::exists('app/views/fields/' . $type . '.blade.php'))
        {
            return 'fields/' . $type;
        }

        return 'fields/default';
    }

    public function input($type, $name, $value = null, $attributes = array(), $options = array())
    {
        $this->buildCssClasses($type, $attributes);
        $label    = $this->buildLabel($name);
        $control  = $this->buildControl($type, $name, $value, $attributes, $options);
        $error    = $this->buildError($name);
        $template = $this->buildTemplate($type);

        return \View::make($template, compact('name', 'label', 'control', 'error'));
    }

} 