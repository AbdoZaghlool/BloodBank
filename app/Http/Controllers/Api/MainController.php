<?php

namespace App\Http\Controllers\Api;

use App\Models\Governorate;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Client;

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
    public function notificationSettings(Request $request)
    {
        $blood_types = $request->user()->bloodTypes()->get();
        $governorates = $request->user()->governorates()->get();
        return responseJson(
            1,
            'success',
            [
                'blood_type' => $blood_types,
                'governorates' => $governorates
            ]
        );
    }

    public function notificationSettingsUpdate(Request $request)
    {

        $rules = [
            'governorates' => 'required|array',
            'blood_types'  => 'required|array'
        ];

        $validation = validator()->make($request->all(), $rules);
        if ($validation->fails()) {
            return responseJson(0, $validation->errors()->first(), $validation->errors());
        }

        $request->user()->bloodTypes()->sync($request->blood_types);
        $request->user()->governorates()->sync($request->governorates);

        $data = [

            'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
            'blood_types' => $request->user()->bloodTypes()->pluck('blood_types.id')->toArray(),
        ];
        return responseJson(1, 'success', $data);
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
}
