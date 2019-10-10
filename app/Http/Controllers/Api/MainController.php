<?php

namespace App\Http\Controllers\Api;

use App\Models\Governorate;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Setting;

class MainController extends Controller
{
    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1, 'success', $governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('governorate_id')) {
                $query->where('governorate_id', $request->governorate_id);
            }
        })->get();
        return responseJson(1, 'success', $cities);
    }


    public function settings()
    {
        $settings = Setting::all();
        return responseJson(1, 'success', $settings);
    }

    public function contacts()
    {
        $contacts = Contact::all();
        return responseJson(1, 'success', $contacts);
    }

    public function categories()
    {
        $categories = Category::all();
        return responseJson(1, 'success', $categories);
    }

    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();
        return responseJson(1, 'success', $bloodTypes);
    }

    public function donations()
    {
        $donations = DonationRequest::all();
        return responseJson(1, 'success', $donations);
    }


    public function donation($id)
    {
        $donation = DonationRequest::all();
        return responseJson(1, 'success', $donation);
    }
}
