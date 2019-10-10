<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'last_donation_date' => 'required',
            'blood_type_id' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|unique:clients'
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();
        return responseJson(1, 'done you are now registerd!', [
            'api_token' => $client->api_token,
            'client' => $client
        ]);
        return redirect('/profile');

    }

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(1, 'client logedin successfully!', [
                    'api_token' => $client->api_token,
                    'client' => $client
                ]);
                return redirect('/profile');
            } else {
                return responseJson(0, 'password does not match!');
            }
        }
        return responseJson(0, 'no clients found!');
    }

    public function profile(Request $request)
    {
        dd($client=Client::where('api_token','like',$request->api_token));
        return view('home')->with('client'->$client);
    }

    public function resetPassword(Request $request)
    {
        $code = str_random(6);
        $user = Client::where('phone', $request->phone);
        if ($user) {
            $update = $user->update(['pin_code' => $code]);
            if ($update) {

                Mail::to("abdomessi2011@yahoo.com")
                    ->bcc("abdoabdo20192020@gmail.com")
                    ->send(new ResetPassword($code));
            }
            return ($user);
        } else {
            return "not registered!";
        }
    }
}
