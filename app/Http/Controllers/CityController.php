<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = City::paginate(20);
        return view('cities.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates=Governorate::all();
        return view('cities.create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // dd($request);
        $rules = [
            'name' => 'required',
            'governorate_id' => 'required'
        ];
        $validator = $this->validate($request, $rules);
        // City::create($request->all());
        $city=new City;
        $city->name = $request['name'];
        $city->governorate_id = $request['governorate_id'];
        $city->save();
        return redirect('/city');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=City::findOrFail($id);
        $governorates=Governorate::all();
        return view ('cities.edit' ,compact('model' ,'governorates'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required'
        ];
        $validator = $this->validate($request, $rules);
        if($validator){
            $record=City::findOrFail($id);
            $record->update($request->all());
            return redirect('/city');
    }else{
        return $php_errormsg;
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=City::findOrFail($id);
        $record->delete();
        return redirect('/city');
    }
}
