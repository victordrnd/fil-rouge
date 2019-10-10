<?php

namespace Models\AR;

use Models\City;
use Models\AR\QueryBuilder;
use Models\AR\QBTrait;


abstract class QBCity extends QueryBuilder
{
    use QBTrait;

    /**
     *
     * @param Country $country
     * @return array
     */
    public function findFromCountry(Country $country): array
    {
        $SQL = "SELECT * from city WHERE CountryCode = :id";
        $statement = $this->cnx->prepare($SQL);
        $statement->bindParam('id', $country->Country_Id);
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
