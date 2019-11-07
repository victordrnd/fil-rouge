<?php

namespace Models;

use Models\AR\QBLanguage;
use Models\Core\Model;

class Language extends QBLanguage
{
    use Model;

    /**
     * Table name
     *
     * @var string
     */
    protected static $table = "countrylanguage";


    /**
     * Table primary key
     *
     * @var string
     */
    protected static $primaryKey = "CountryLanguage_Id";

    /**
     * List of all table column
     *
     * @var array
     */
    protected $attributes = [
        'CountryLanguage_Id', 'CountryCode', 'Language', 'IsOfficial', 'Percentage'
    ];
    /**
     *
     * @var int
     */
    private $CountryLanguage_Id;


    /**
     *
     * @var string
     */
    private $CountryCode;


    /**
     *
     * @var string
     */
    private $Language;


    /**
     *
     * @var string
     */
    private $IsOfficial;


    /**
     *
     * @var float
     */
    private $Percentage;


    /**
     *
     * @return integer
     */
    public function getCountryLanguageId(): int
    {
        return $this->CountryLanguage_Id;
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
    public function getLanguage(): string
    {
        return $this->Language;
    }


    /**
     *
     * @return string
     */
    public function getIsOfficial(): string
    {
        return $this->IsOfficial;
    }




    /**
     *
     * @return float
     */
    public function getPercentage(): float
    {
        return $this->Percentage;
    }
}
