<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();

        // Aqui eu marco que, por padrão, desejo lançar as exceções ao invés de tratá-las. Dessa forma consigo
        // saber quando uma exceção foi lançada e capturá-la durante o erro. Caso não desejo este comportamento,
        // por exemplo, no caso de querer saber se serei redirecionado para o login quando estiver em uma tela 
        // não permitida, é só chamar antes o $this->withExceptionHandling(), que vai tratar minha exception 
        // Unauthorized e redirecionar para login
        $this->withoutExceptionHandling();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');

        $this->be($user);

        return $this;
    }
}
