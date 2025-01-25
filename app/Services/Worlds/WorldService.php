<?php

namespace App\Services\Worlds;

use App\Repositories\Worlds\WorldRepository;

class WorldService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public WorldRepository $worldRepository)
    {
    }
    /**
     * Summary of getCountriesById
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCountryById($id)
    {
        $countries = $this->worldRepository->getCountryById($id);
        if (!$countries) {
            abort(404);
        }
        return $countries;
    }
    /**
     * Summary of getGovernoratesById
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getGovernorateById($id)
    {
        $governorate = $this->worldRepository->getGovernorateById($id);
        if (!$governorate) {
            abort(404);
        }
        return $governorate;
    }
    /**
     * Summary of getCitiesById
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCityById($id)
    {
        $cities = $this->worldRepository->getCountryById($id);
        if (!$cities) {
            abort(404);
        }
        return $cities;
    }
    /**
     * Summary of getCountries
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCountries()
    {
        return $this->worldRepository->getCountries();
    }
    /**
     * Summary of getGovernorates
     * @param mixed $id
     * @return mixed
     */
    public function getGovernorates($id)
    {
        $country = self::getCountryById($id);
        return $this->worldRepository->getGovernorates($country);
    }
    /**
     * Summary of getCities
     * @param mixed $governorate_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCities($governorate_id)
    {
        $governorate = self::getGovernorateById($governorate_id);
        return $this->worldRepository->getCities($governorate);
    }
    /**
     * Summary of changeStatus
     * @param mixed $country_id
     * @return mixed
     */
    public function changeStatus($country_id)
    {
        $country = self::getCountryById($country_id);
        $country = $this->worldRepository->changeStatus($country);
        if (!$country) {
            return false;
        }
        return true;
    }
    public function changeGovernoStatus($governo_id)
    {
        $governorate = self::getGovernorateById($governo_id);
        $governorate = $this->worldRepository->changeStatus($governorate);
        if (!$governorate) {
            return false;
        }
        return true;
    }
    public function changeShippingPrice($request)
    {
        $governorate = self::getGovernorateById($request->governorate_id);
        $governorate = $this->worldRepository->changeShippingPrice($governorate, $request->price);
        if (!$governorate) {
            return false;
        }
        return true;
    }
}
