<?php

namespace Models\Core;


trait Model {


    public function __construct()
    {
       
    }

    
    protected function getPrimaryKeyValue()
    {
        return $this->{static::$primaryKey};
    }

    protected function setPrimaryKeyValue(int $value)
    {
        $class = new \ReflectionClass(get_called_class());
        if($class->hasProperty("primaryKey")){
            $this->{static::$primaryKey} = $value;
        }
    }

    
}
?>