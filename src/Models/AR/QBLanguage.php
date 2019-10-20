<?php

namespace Models\AR;

use Models\AR\QueryBuilder;
use Models\Singleton;
use Models\Language;

abstract class QBLanguage extends QueryBuilder
{

    public static function findFromCountryCode(string $code): array
    {
        $SQL = "SELECT * from countrylanguage WHERE CountryCode = :code";
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->bindParam('code', $code);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "\Models\Language");
        $languages = $statement->fetchAll();
        return $languages;
    }
}
