<?php

namespace Models;

trait Model {


    public function __construct()
    {
       parent::__construct(Singleton::getInstance()->cnx);
    }

    
    protected function getPrimaryKeyValue()
    {
        return $this->{static::$primaryKey};
    }

    protected function setPrimaryKeyValue(int $value)
    {
        $this->{static::$primaryKey} = $value;
    }

    
}
?>