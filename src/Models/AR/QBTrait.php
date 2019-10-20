<?php

namespace Models\AR;
trait QBTrait{

    protected $cnx;

    public function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

}
?>