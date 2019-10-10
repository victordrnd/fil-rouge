<?php
namespace Models\AR;

use Models\AR\QueryBuilder;
use Models\AR\QRTrait;
use Models\Country;
use Models\Singleton;

abstract class QBCountry extends QueryBuilder
{
    use QBTrait;
    private $cnx;

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
}
?>