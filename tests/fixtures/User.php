<?php

namespace tests\fixtures;

use modval\ModelTools;

class User extends ModelTools
{

    /** @var string*/
    private $id;
    /** @var string */
    private $username;
    /** @var string */
    private $password;
    /** @var string */
    private $name;
    /** @var string */
    private $nickname;

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     * @param string $name
     * @param string $nickname
     */
    public function __construct(
        $username,
        $password,
        $name,
        $nickname
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->nickname = $nickname;
    }


    /**
     * @return array
     */
    public function validationRules()
    {
        return [
            'required' => [
                'fields' => 'username, password, nickname',
                'label' => '%s is required',
            ],
            'max' => [
                'fields' => 'password',
                'label' => 'max length of %s should be 20',
                'options' => [
                    'length' => 10
                ]
            ],
            'min' => [
                'fields' => 'password',
                'label' => 'min length of %s should be 8',
                'options' => [
                    'length' => 8
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

}