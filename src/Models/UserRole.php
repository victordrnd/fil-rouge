<?php

namespace Models;

use Models\Core\Model;
use Models\AR\QueryBuilder;


class UserRole extends QueryBuilder{

    use Model;

    protected $role_id;
    protected $user_id;

    /**
     * Table name
     *
     * @var string
     */
    protected static $table = "user_role";


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
    protected static $attributes = [
        'role_id', 'user_id'
    ];


    public function getRoleId(){
        return $this->role_id;
    }

    public function getUserId(){
        return $this->user_id;
    }
}

?>