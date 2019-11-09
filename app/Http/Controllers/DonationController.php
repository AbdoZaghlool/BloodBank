<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = DonationRequest::where(function($query) use($request)
            {
                $query->where('paitant_name','like','%'.$request->name.'%');
                $query->where('city_id','=','%'.$request->city_id.'%');
                $query->where('blood_type_id','=','%'.$request->blood_type_id.'%');
            })->latest()->paginate(15);
        return view('donations.index', compact('records'));
    }

    public function show(Request $request)
    {
        $record = DonationRequest::findOrFail($request['id']);
        return view('donations.show',compact('record'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=DonationRequest::findOrFail($id);
        $record->delete();
        return redirect('/donation');
    }

}
