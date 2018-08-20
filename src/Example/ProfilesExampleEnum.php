<?php

namespace JefersonC\Example;

use JefersonC\Enum\ {
    PrettyEnum,
    PrettyEnumContract
};

final class ProfilesExampleEnum extends PrettyEnum implements PrettyEnumContract
{
    public function register() {
        return [
            'ADMIN' => [
                'name' => 'Administrador',
                'value' => 'ADMIN',
                'description' => 'Perfil de permissões para administradores'
            ],
            'USER' => [
                'name' => 'Usuário',
                'value' => 'USER',
                'description' => 'Perfil de permissões para usuários convencionais'
            ]
        ];
    }
}
