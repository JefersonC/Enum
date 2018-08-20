<?php

namespace JefersonC\Tests;

use JefersonC\ {
    Enum\PrettyEnum,
    Enum\InvalidEnumKeyException,
    Enum\InvalidEnumMethodException,
    Example\ExampleEnum,
    Example\ProfilesExampleEnum,
};

use PHPUnit\Framework\TestCase;

class PrettyEnumTest extends TestCase
{
    public function test_getting_enum_value()
    {
        $this->assertEquals(ExampleEnum::get('TEST'), 1);
    }

    public function test_getting_pretty_value()
    {
        $this->assertEquals(ExampleEnum::pretty('TEST'), "Teste");
    }

    public function test_getting_list_of_enumerator()
    {
        $list = ExampleEnum::all();

        $this->assertEquals($list[0]->value, 1);
        $this->assertEquals($list[0]->name, "Teste");
    }

    public function test_throws_exception_when_key_does_not_exists()
    {
        $this->expectException(InvalidEnumKeyException::class);
        $this->assertEquals(ExampleEnum::pretty('ASDSAD'), "sdadas");
    }

    public function test_getting_multiples_enuns_values()
    {
        $this->assertEquals(ExampleEnum::pretty('BLUE'), 'Azul');
        $this->assertEquals(ExampleEnum::pretty('RED'), 'Vermelho');
        $this->assertEquals(ExampleEnum::get('BLUE') + ExampleEnum::get('RED'), 55);
    }

    public function test_throws_exception_when_method_does_not_exists()
    {
      $this->expectException(InvalidEnumMethodException::class);
      $this->assertEquals(ExampleEnum::safdfsd('ASDSAD'), "sdadas");
    }

    public function test_get_custom_propertie_from_enum()
    {
        $item = ProfilesExampleEnum::item('ADMIN');
        $this->assertEquals($item->value, 'ADMIN');
        $this->assertEquals($item->name, 'Administrador');
        $this->assertEquals($item->description, 'Perfil de permissões para administradores');
    }
}
