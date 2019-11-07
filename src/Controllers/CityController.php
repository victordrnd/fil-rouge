<?php

namespace Controllers;

use Models\City;
use Models\Country;
use Models\Core\Request;

use Renderer;

class CityController extends Controller
{


    /**
     * Display city with specified id
     * $req (inutile ici) est directement injecté par le router qui fait appele au Resolver de function 
     * 
     * @param int $id
     * @return void
     */
    public function show(Request $req, int $id)
    {
        $city = City::find($id);
        $country = Country::findFromCountryCode($city->getCountryCode());
        echo Renderer::render('city/city.php', compact("city", 'country'));
    }

    /**
     * Deprecated function 
     *
     * @param string $continent
     * @return void
     */
    public function showFromContinent(string $continent)
    {
        $cities = City::findFromContinent($continent);
        echo Renderer::render('city/cities.php', compact("cities", "continent"));
    }

    /**
     * Search cities with name param
     * @param string $name
     * @return void
     */
    public function search(Request $req)
    {
        $cities = City::findByNameStartingWith($req->input('keyword'));
        $caller = "search";
        $name = $req->keyword;
        echo Renderer::render('city/cities.php', compact('cities', 'caller', 'name'));
    }

    /**
     * Create a new City from form.
     *
     * @param Request $req
     * @return void
     */
    public function create(Request $req){
        $city = City::create([
            'name' => $req->name,
            'countrycode' => $req->countrycode,
            'district' => $req->district,
            'population' => $req->population
        ]);
        header('location:/public_html/city/show/'.$city->getCityId());
    }

    /**
     * Update city with specified id
     *
     * @param Request $req
     * @param integer $id
     * @return void
     */
    public function update(Request $req, int $id)
    {
        $city = City::find($id);
        $city->update([
            'Name' => $req->name,
            'CountryCode' => $req->countryCode,
            'District' => $req->district,
            'Population' => $req->population
        ]);
        header('location:/public_html/city/show/'.$city->getCityId());
    }


    /**
     * Delete City with specified id
     *
     * @param [type] $id
     * @return void
     */
    public function delete(int $id)
    {
        $city = City::find($id);
        $country = Country::findFromCountryCode($city->getCountryCode());
        $city->remove();

        header('location:/public_html/country/show/' . $country->Country_Id);
    }



    /**
     * Display create city view
     *
     * @param string $countryCode
     * @return void
     */
    public function createCityView(string $countryCode){
        echo Renderer::render('city/create.php', compact('countryCode'));
    }
}
