<?php

namespace App\Repositories\Worlds;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;

class WorldRepository
{
    public function getCountryById($id)
    {
        return Country::find($id);
    }
    public function getGovernorateById($id)
    {
        return Governorate::find($id);
    }
    public function getCityById($id)
    {
        return City::find($id);
    }
    /**
     * Summary of getCountries
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCountries()
    {
        $countries = Country::withCount('governorates', 'users')
            ->when(!empty(request()->keyword), function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%');
            })->paginate(5);

        return $countries;
    }
    /**
     * Summary of getGovernorates
     * @param mixed $country
     */
    public function getGovernorates($country)
    {
        $governorates = $country->governorates()
            ->with('country', 'shippingGoverno')
            ->withCount('users', 'cities')
            ->when(!empty(request()->keyword), function ($query) {
                $query->where('name', 'LIKE', '%' . request()->keyword . '%');
            })->paginate(10);

        return $governorates;
    }
    /**
     * Summary of getCities
     * @param mixed $governorate
     * @return mixed
     */
    public function getCities($governorate)
    {
        $cities = $governorate->cities;
        return $cities;
    }
    /**
     * Summary of changeStatus
     * @param mixed $model
     */
    public function changeStatus($model)
    {
        $model = $model->update([
            'is_active' => $model->is_active == 'Active' || $model->is_active == 'مفعل' ? 0 : 1,
        ]);
        return $model;
    }
    /**
     * Summary of changeShippingPrice
     * @param mixed $governorate
     * @param mixed $price
     */
    public function changeShippingPrice($governorate, $price)
    {
        return $governorate->shippingGoverno->update(['price' => $price]);
    }
}
