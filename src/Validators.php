<?php

namespace modval;


class Validators
{

    /**
     * @param $argument
     * @param null|array $options
     * @return bool
     * Options: None
     */
    protected function required($argument, $options = null)
    {
        return !empty($this->{'get'.ucfirst($argument)}());
    }

    /**
     * @param $argument
     * @param null|array $options
     * @return bool
     * Options: length [int]
     */
    protected function max($argument, $options = null)
    {
        $length = $this->assertOptionValue($options, 'length', 8);
        $value = $this->getValue($argument);

        if (strlen($value) > $length) {
            return false;
        }

        return true;
    }

    /**
     * @param $argument
     * @param null|array $options
     * @return bool
     * Options: length [int]
     */
    protected function min($argument, $options = null)
    {
        $length = $this->assertOptionValue($options, 'length', 3);
        $value = $this->getValue($argument);

        if (strlen($value) < $length) {
            return false;
        }

        return true;
    }

    private function assertOptionValue($options, $value, $default)
    {
        if (isset($options[$value]) && !empty($options[$value])) {
            return $options[$value];
        }

        return $default;
    }

    /**
     * @param $param
     * @return mixed
     */
    private function getValue($param)
    {
        $argument = $this->{'get'.ucfirst($param)}();

        return $argument;
    }





}