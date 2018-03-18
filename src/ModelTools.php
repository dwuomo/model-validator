<?php

namespace modval;


abstract class ModelTools extends Validators
{
    /** @var  array */
    private $errors=[];

    /**
     * @return boolean
     */
    public function validate()
    {
        foreach ($this->validationRules() as $key => $argumentList) {
            $arguments = explode(',', $argumentList['fields']);
            foreach ($arguments as $argument) {

                $options = isset($argumentList['options'])
                    ? $argumentList['options']
                    : null;

                $resolved = $this->$key(trim($argument), $options);

                if (!$resolved) {
                    $this->errors[trim($argument)][] = sprintf($argumentList['label'], $argument);
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }


    /**
     * @return array
     */
    abstract public function validationRules();

}