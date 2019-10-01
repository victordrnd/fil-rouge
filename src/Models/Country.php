<?php

namespace Models;

use Models\AR\QBCountry;
use Models\Model;

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
   protected $attributes = [
      'Country_Id', 'Code', 'Name', 'Continent', 'Region', 'SurfaceArea', 'IndepYear',
      'Population', 'LifeExpectancy', 'GNP', 'GNPOld', 'LocalName', 'GovernmentForm', 'HeadOfState', 'Capital', 'Code2', 'Image1', 'Image2'
   ];





   protected $Country_Id;
   protected $Code;
   protected $Name;
   protected $Continent;
   protected $Region;
   protected $SurfaceArea;
   protected $IndepYear;
   protected $Population;
   protected $LifeExpectancy;
   protected $GNP;
   protected $GNPOld;
   protected $LocalName;
   protected $GovernmentForm;
   protected $HeadOfState;
   protected $Capital;
   protected $Code2;
   protected $Image1;
   protected $Image2;


}
