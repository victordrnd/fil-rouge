<?php

namespace Models;

use Models\AR\QBCountry;
use Models\Core\Model;

class Country extends QBCountry
{
   use Model;

   /**
    * Table name
    *
    * @var string
    */
   protected static $table = "country";


   /**
    * Table primary key
    *
    * @var string
    */
   protected static $primaryKey = "Country_Id";

   /**
    * List of all table column
    *
    * @var array
    */
   protected static $attributes = [
      'Country_Id', 'Code', 'Name', 'Continent', 'Region', 'SurfaceArea', 'IndepYear',
      'Population', 'LifeExpectancy', 'GNP', 'GNPOld', 'LocalName', 'GovernmentForm', 'HeadOfState', 'Capital', 'Code2', 'Image1', 'Image2'
   ];
   
   public function cities(){
      return $this->hasMany(City::class, 'Code', 'CountryCode');
   }


   public function languages(){
      return $this->hasMany(Language::class, 'Code', 'CountryCode');
   }


   public function capital(){
      return $this->hasOne(City::class, 'Capital', 'City_Id');
   }




   public $Country_Id;
   public $Code;
   public $Name;
   public $Continent;
   public $Region;
   public $SurfaceArea;
   public $IndepYear;
   public $Population;
   public $LifeExpectancy;
   public $GNP;
   public $GNPOld;
   public $LocalName;
   public $GovernmentForm;
   public $HeadOfState;
   public $Capital;
   public $Code2;
   public $Image1;
   public $Image2;


}
