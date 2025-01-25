<?php

namespace App\Http\Controllers\Dashboard\Worlds;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Worlds\WorldService;
use App\Http\Requests\ChangeShippingPrice;

class WorldController extends Controller
{
    public function __construct(public WorldService $worldService)
    {
    }
    public function getCountriesById($id)
    {
        $countries = $this->worldService->getCountryById($id);
        return $countries;
    }
    public function getCountries()
    {
        $countries = $this->worldService->getCountries();
        return view('dashboard.worlds.countries', compact('countries'));
    }
    public function getGovByCountry($id)
    {
        $governorates = $this->worldService->getGovernorates($id);
        return view('dashboard.worlds.governorates', compact('governorates'));
    }
    public function getCitiesByGovId($governorate_id)
    {
        $cities = $this->worldService->getCities($governorate_id);
        return view('dashboard.worlds.cities', compact('cities'));
    }
    public function changeStatus($country_id)
    {
        $country = $this->worldService->changeStatus($country_id);
        if (!$country) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.msg_error_country'),
            ],404);
        }
        $country = $this->worldService->getCountryById($country_id);
        return response()->json([
            'status' => true,
            'message' => __('dashboard.msg_country_status'),
            'data' => $country,
        ],200);
    }
    public function changeGovernoStatus($governo_id)
    {
        $governorate = $this->worldService->changeGovernoStatus($governo_id);
        if (!$governorate) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.msg_error_governorate'),
            ],404);
        }
        $governorate = $this->worldService->getGovernorateById($governo_id);
        return response()->json([
            'status' => true,
            'message' => __('dashboard.msg_governorate_status'),
            'data' => $governorate,
        ],200);
    }
    public function changeShippingPrice(ChangeShippingPrice $request)
    {
        if (!$this->worldService->changeShippingPrice($request)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.msg_error_governorate'),
            ],404);
        }

        $governo = $this->worldService->getGovernorateById($request->governorate_id);
        $governo->load('shippingGoverno');

        return response()->json([
            'status' => true,
            'message' => __('dashboard.done_change'),
            'data' => $governo,
        ],200);
    }
}
