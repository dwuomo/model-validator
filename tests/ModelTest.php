<?php
/**
 * Created by PhpStorm.
 * User: dwuomo
 * Date: 17/03/18
 * Time: 21:36
 */

namespace tests;


use PHPUnit\Framework\TestCase;
use tests\fixtures\User;

class ModelTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function should_validate_success()
    {
        $user = new User(
            'dwuomo',
            '12345678',
            'Joaquín Armengol',
            'dwuomo'
        );

        $actual = $user->validate();
        $errors = $user->getErrors();
        $this->assertTrue($actual);
        $this->assertTrue(empty($errors));
    }

    /** @test */
    public function validate_min_password()
    {
        $user = new User(
            'dwuomo',
            '123456',
            'Joaquín Armengol',
            'dwuomo'
        );

        $actual = $user->validate();
        $errors = $user->getErrors();
        $this->assertFalse($actual);
        $this->assertTrue(!empty($errors));
    }

    /** @test */
    public function validate_max_password()
    {
        $user = new User(
            'dwuomo',
            '12345678910',
            'Joaquín Armengol',
            'dwuomo'
        );

        $actual = $user->validate();
        $errors = $user->getErrors();
        $this->assertFalse($actual);
        $this->assertTrue(!empty($errors));
    }

    /** @test */
    public function validate_require()
    {
        $user = new User(
            '',
            '12345678',
            'Joaquín Armengol',
            'dwuomo'
        );

        $actual = $user->validate();
        $errors = $user->getErrors();
        $this->assertFalse($actual);
        $this->assertTrue(!empty($errors));
    }

}