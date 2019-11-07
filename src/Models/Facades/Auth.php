<?php
namespace Models\Facades;

use Models\User;

class Auth{


    /**
     * Undocumented function
     *
     * @return boolean
     */
    public static function isLogged() : bool{
        return isset($_SESSION['user']);
    }


    /**
     * Undocumented function
     *
     * @param [type] $permission
     * @return boolean
     */
    public static function has($permission) : bool {
        return true;
    }


    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public static function log(User $user) : void{
        $_SESSION['nom'] = $user->getNom();
        $_SESSION['permission'] = 1111;
    }


    public static function attempt(array $credentials) : bool{
        $user = User::where('login' , $credentials[0]);
        if(isset($user[0])){
            $user = $user[0];
            if(password_verify($credentials[1], $user->getPassword())){
                self::log($user);
                return true;
            }else{
                throw new \Exception("Le mot de passe saisis est incorrect");
            }
        }else{
            throw new \Exception("L'utilisateur n'existe pas");
        }

    }
}

?>