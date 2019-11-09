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
        $user->roles[] = Role::find(1);
        return $user;
    }


    public static function find(int $id)
    {
        $user = parent::find($id);
        self::getUserRole($user);
        return $user;
    }



    public static function where(string $column, $operator = "=", $value = null)
    {
        $users = parent::where($column, $operator, $value);
        self::getUsersRoles($users);
        return $users;
    }


    public static function all() : array
    {
        $users = parent::all();
        self::getUsersRoles($users);
        return $users;
    }


    private static function getUsersRoles(&$users)
    {
        foreach ($users as &$user) {
            self::getUserRole($user);
        }
    }

    private static function getUserRole(&$user)
    {
        $user_roles = UserRole::where('user_id', $user->getUserId());
        foreach ($user_roles as $user_role) {
            $user->roles[] = Role::find($user_role->getRoleId());
        }
    }
}
