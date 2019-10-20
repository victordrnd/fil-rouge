<?php
namespace Models\AR;

use Models\AR\QueryBuilder;
use Models\Country;
use Models\Singleton;

abstract class QBCountry extends QueryBuilder
{
    

    /**
     *
     * @param Country $country
     * @return array
     */
    public static function findFromContinent(string $continent): array
    {
        $SQL = "SELECT * from country WHERE Continent = :continent";
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->bindParam('continent', $continent);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "\Models\Country");
        $countries = $statement->fetchAll();
        return $countries;
    }

    public static function findFromCountryCode(string $code) : Country{
        $SQL = "SELECT * from country WHERE Code = :code";
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->bindParam('code', $code);
        $statement->execute();
        $countries = $statement->fetchObject("\Models\Country");
        return $countries;
    }
}
?>