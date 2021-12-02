<?php

namespace Tests\Unit;

use App\Helpers\StringHelper;
use App\Models\Moto;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_string_helper_primera_letra_maiuscula()
    {
        $nome = new Moto();
        $nome = StringHelper::primeiraLetraMaiscula($nome);
        $this->assertEquals(Moto::class, $nome);
    }
}
