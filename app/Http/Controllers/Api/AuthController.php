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
            'phone' => 'required|unique:clients',
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
                return redirect('api/v1/profile');
            } else {
                return responseJson(0, 'password does not match!');
            }
        }
        return responseJson(0, 'no clients found!');
    }

    public function profile(Request $request)
    {
        $client=$request->user();
        return view('home')/**->with('client'->$client) */;
    }

    public function resetPassword(Request $request)
    {
        $code = str_random(6);
        $user = Client::where('phone', $request->phone)->first();
        if ($user) {
            $update = $user->update(['pin_code' => $code]);
            if ($update) {

                Mail::to($user->email)
                    ->bcc('abdoabdo20192020@gmail.com')
                    ->send(new ResetPassword($code));
            }
            return responseJson(1, "check your mail!");
        } else {
            return responseJson(0, "not registered!");
        }
    }

    public function newPassword(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required|size:11|digits:11',
            'pin_code' => 'required|size:6',
            'password' => 'required|confirmed'
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $user = Client::where('phone', $request->phone)->first();

        if ($user) {
            $var = Client::where('pin_code', $request->pin_code)->first();
            if ($var) {
                $npass = Hash::make($request->password);
                $var->update(['password' => $npass]);
                return responseJson(1, 'your password updated');
            } else {
                return responseJson(0, 'your pin_code doesn\'t match');
            }
        } else {
            return responseJson(0, 'the phone is not correct');
        }
    }
}
