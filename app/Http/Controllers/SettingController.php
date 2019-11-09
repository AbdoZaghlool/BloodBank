<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Setting::first();
        return view('settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'notifications_settings_text' => 'required',
            'about_app' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'fb_url' => 'required',
            'tw_url' => 'required',
            'insta_url' => 'required',
            'youTube_url' => 'required',
            'whatsApp_url' => 'required',
        ];
        $validator = $this->validate($request, $rules);
        if ($validator) {
            $record = Setting::first();
            $record->update($request->all());
            return back();
        } else {echo "there was an error"; }
    }
}
