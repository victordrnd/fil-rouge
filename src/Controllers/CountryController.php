<?php

namespace Controllers;

use Models\Country;
use Models\City;
use Models\Language;
use Models\Core\Request;
use Renderer;

class CountryController extends Controller
{

    /**
     * Show Country with specified id
     *
     * @param integer $id
     * @return void
     */
    public function show(int $id): void
    {
        $country = Country::find($id);
        $capital = City::find($country->Capital);
        $cities = City::findFromCountry($country);
        $languages = Language::findFromCountryCode($country->Code);
        $languageLabels = [];
        $percentages = [];
        foreach ($languages as $language) {
            $languageLabels[] = $language->getLanguage();
            $percentages[] = $language->getPercentage();
        }
        echo Renderer::render('country/country.php', compact('country', 'cities', 'capital', 'languageLabels', 'percentages'));
    }

    /**
     * Display all country 
     * TODO: pagination
     *
     * @return void
     */
    public function showAll(): void
    {
        $title = "Pays";
        $countries = Country::all();
        $capital = [];
        foreach($countries as $country){
            $capital[] = City::find($country->Capital);
        }
        echo Renderer::render('country/countries.php', compact("countries", "capital", "title"));
    }

    /**
     * List all countries from specified continent
     *
     * @param string $continent
     * @return void
     */
    public function findFromContinent(string $continent): void
    {
        $title = $continent;
        $countries = Country::findFromContinent($continent);
        $capital = [];
        foreach ($countries as $country) {
            $capital[] = City::find($country->Capital);
        }
        echo Renderer::render('country/countries.php', compact("countries", "capital", "title"));
    }


    public function create(Request $req){
        
        $country = Country::create([
            'Code' => $req->code,
            'Name' => $req->name,
            'Continent' => $req->continent,
            'Region' => $req->region,
            'SurfaceArea' => $req->surface,
            'IndepYear' => $req->dateindep,
            'Population' => $req->population,
            'LocalName' => $req->localname,
            'GovernmentForm' => $req->governmentform,
            'Code2' => $req->code2,
            'Image1' => $req->flag
        ]);
        header('location:/public_html/country/show/'.$country->Country_Id);

    }


    /**
     * Update country with specified id
     *
     * @param integer $id
     * @return void
     */
    public function update(Request $req, int $id): void
    {
        $country = Country::find($id);
        $country->update([
            'Name' => $req->name,
            'Continent' => $req->continent,
            'Region' => $req->region,
            'IndepYear' => $req->indepyear,
            'Population' => $req->population,
            'Capital' => $req->capital
        ]);

        header('location:/public_html/country/show/'.$country->Country_Id);
    }


    /**
     * Delete country with specified id and it's foreign key
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {

        $country = Country::find($id);
        $cities = City::where('CountryCode', $country->Code);
        foreach ($cities as $city) {
            $city->remove();
        }
        $languages = Language::where("CountryCode", $country->Code);
        foreach ($languages as $language) {
            $language->remove();
        }
        $country->remove();
        header('location:/public_html/');
    }




    /**
     * Display create country view
     *
     * @return void
     */
    public function createCountryView(){
        echo Renderer::render('country/create.php');
    }
}
