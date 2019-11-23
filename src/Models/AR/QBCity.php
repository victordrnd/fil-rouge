<?php

namespace Models\AR;

use Models\City;
use Models\AR\QueryBuilder;
use Models\AR\QBTrait;
use Models\Singleton;
use Models\Country;


abstract class QBCity extends QueryBuilder
{
    use QBTrait;
    private $cnx;

    public function __construct($cnx)
    {
        $this->cnx = $cnx;
    }
    /**
     *
     * @param Country $country
     * @return array
     */
    public static function findFromCountry(Country $country): array
    {
        $SQL = "SELECT * from city WHERE CountryCode = :id";
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->bindParam('id', $country->Code);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "\Models\City");
        $cities = $statement->fetchAll();
        return $cities;
    }


    public static function findFromContinent(string $continent){
        $SQL = "SELECT city.* from city, country WHERE country.Continent = :continent and city.CountryCode = country.code";
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->bindParam('continent', $continent);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "\Models\City");
        $cities = $statement->fetchAll();
        return $cities;
    }



    /**
     *
     * @param string $name
     * @return array
     */
    public function findByName(string $name): array
    {
        $SQL = "SELECT * FROM city WHERE Name = :name";
        $statement = $this->cnx->prepare($SQL);
        $statement->bindParam('name', $name);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "\Models\City");
        $cities = $statement->fetchAll();
        return $cities;
    }


    /**
     *
     * @param string $pattern
     * @return array
     */
    public function findByNameStartingWith(string $pattern): array
    {
        $SQL = "SELECT * FROm city WHERE Name LIKE :name";
        $statement = $this->cnx->prepare($SQL);
        $pattern = "$pattern%";
        $statement->bindParam('name', $pattern);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "\Models\City");
        $cities = $statement->fetchAll();
        return $cities;
    }
}
