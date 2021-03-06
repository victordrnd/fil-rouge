<?php
namespace Models\Core;


abstract class ConfReader{

    /**
     *
     * @var [array]
     */
    private static $config;
    

    protected function __construct(){
        self::$config = parse_ini_file('../config.ini');
    }

    /**
     *
     * @param string $value
     * @return mixed
     */
    public function getConfigValue(string $value){
        if(isset(self::$config[$value])){
            return self::$config[$value];
        }else{
            throw new \Exception("La clé de configuration demandé n'existe pas", 1);
        }
    }

}
