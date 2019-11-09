<?php
namespace Models\AR;

use Models\AR\QBTrait;
use Models\AR\QueryBuilder;
use Models\Language;
use Models\Singleton;

abstract class QBLanguage extends QueryBuilder
{
    use QBTrait;

    public static function findLanguagesFromPays($countryCode){
        $SQL = 'SELECT * from countrylanguage where CountryCode = :pays';
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->bindParam('pays', $countryCode);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "\Models\Language");
        $languages = $statement->fetchAll();
        return $languages;
    }
}

