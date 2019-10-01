<?php

namespace Models\AR;
trait QBTrait{

    private $cnx;

    public function __construct($cnx)
    {
        parent::__construct($cnx);
        $this->cnx = $cnx;
    }

}
?>