<?php

namespace Models;

use Models\Core\Model;
use Models\AR\QBUser;

class User extends QBUser
{
    use Model;

    protected $user_id;
    protected $nom;
    protected $login;
    protected $password;


    /**
     * Table name
     *
     * @var string
     */
    protected static $table = "users";
    
    
    /**
     * Table primary key
     *
     * @var string
     */
    protected static $primaryKey = "user_id";
    
    /**
     * List of all table column
     *
     * @var array
     */
    protected static $attributes = ['user_id', 'nom', 'login', 'password'];
    
    

    public function roles(){
        return $this->belongsToMany(Role::class, UserRole::class, 'role_id', 'user_id');
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getPassword()
    {
        return $this->password;
    }



    /**
     * Undocumented function
     *
     * @param [type] $nom
     * @return void
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    /**
     * Undocumented function
     *
     * @param [type] $login
     * @return void
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * Undocumented function
     *
     * @param [type] $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


}
