<?php

namespace Models\AR;

use Models\AR\QueryBuilder;
use Models\UserRole;
use Models\Role;

class QBUser extends QueryBuilder
{

    public static function create(array $columns)
    {
        $user = parent::create($columns);
        UserRole::create([
            'user_id' => $user->getUserId(),
            'role_id' => 1
        ]);
        return $user;
    }
}
