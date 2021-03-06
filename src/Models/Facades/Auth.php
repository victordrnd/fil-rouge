<?php

namespace Models\Facades;

use Models\User;
use Models\Permission;

class Auth
{


    /**
     * Undocumented function
     *
     * @return boolean
     */
    public static function isLogged(): bool
    {
        return isset($_SESSION['nom']) && isset($_SESSION['permissions']);
    }


    /**
     * Verify if user have permission
     *
     * @param [type] $permission
     * @return boolean
     */
    public static function has($permission): bool
    {
        if (isset($_SESSION['permissions'])) {
            return intval($_SESSION['permissions'] & sprintf('%08d',decbin($permission)));
        } else {
            return false;
        }
    }


    /**
     * Log in the user
     *
     * @param User $user
     * @return void
     */
    public static function log($user): void
    {
        $_SESSION['nom'] = $user->getNom();
        $permissions = "00000000";
        foreach ($user->roles() as $role) {
             $permissions =  $role->getPermissions() |  $permissions;
        }
        $_SESSION['permissions'] = $permissions;
    }


    public static function attempt(array $credentials): bool
    {
        $user = User::where('login', $credentials[0])->with('roles')->first();
        if (!is_null($user)) {
            if (password_verify($credentials[1], $user->getPassword())) {
                self::log($user);
                return true;
            } else {
                throw new \Exception("Le mot de passe saisis est incorrect");
            }
        } else {
            throw new \Exception("L'utilisateur n'existe pas");
        }
    }
}
