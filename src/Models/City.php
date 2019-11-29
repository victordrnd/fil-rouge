<?php

namespace Models;


use Models\AR\QBCity;
use Models\Core\Model;

class City extends QBCity
{
   use Model;


   /**
    * Table name
    *
    * @var string
    */
   protected static $table = "city";


   /**
    * Table primary key
    *
    * @var string
    */
   protected static $primaryKey = "City_Id";

   /**
    * List of all table column
    *
    * @var array
    */
   protected static $attributes = ['City_Id', 'Name', 'CountryCode', 'District', 'Population'];


   public function country()
   {
      return $this->belongsTo(Country::class, 'CountryCode', 'Code');
   }

   /**
    *
    * @var int
    */
   protected $City_Id = 0;



   /**
    *
    * @var string
    */
   protected $Name = "";



   /**
    * @var string
    */
   protected $CountryCode = "";



   /**
    *
    * @var string
    */
   protected $District = "";




   /**
    *
    * @var integer
    */
   protected $Population = 0;



   /**
    *
    * @return int
    */
   public function getCityId(): int
   {
      return $this->City_Id;
   }

   /**
    *
    * @return string
    */
   public function getName(): string
   {
      return strtoupper($this->Name);
   }

   /**
    *
    * @return string
    */
   public function getCountryCode(): string
   {
      return $this->CountryCode;
   }


   /**
    *
    * @return string
    */
   public function getDistrict(): string
   {
      return $this->District;
   }


   /**
    *
    * @return int
    */
   public function getPopulation(): int
   {
      return $this->Population;
   }


   //Setters 

   /**
    *
    * @param string $name
    * @return void
    */
   public function setName(string $name)
   {
      $this->Name = $name;
   }





   /**
    *
    * @param string $countryCode
    * @return void
    */
   public function setCountryCode(string $countryCode)
   {
      $this->CountryCode = $countryCode;
   }






   /**
    *
    * @param string $district
    * @return void
    */
   public function setDistrict(string $district)
   {
      $this->District = $district;
   }




   /**
    *
    * @param integer $population
    * @return void
    */
   public function setPopulation(int $population)
   {
      $this->Population = $population;
   }
}
