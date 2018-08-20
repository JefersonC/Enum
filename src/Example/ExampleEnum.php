<?php

namespace JefersonC\Example;

use JefersonC\Enum\{
    PrettyEnum,
    PrettyEnumContract
};

final class ExampleEnum extends PrettyEnum implements PrettyEnumContract
{
    public function register() {
        return [
            'TEST' => [
                'name' => 'Teste',
                'value' => 1
            ],
            'BLUE' => [
                'name' => 'Azul',
                'value' => 5
            ],
            'RED' => [
                'name' => 'Vermelho',
                'value' => 50
            ]
        ];
    }
}
