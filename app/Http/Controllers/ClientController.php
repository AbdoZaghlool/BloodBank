<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = Client::where(function($query)use($request)
            {
                $query->where('name','like','%'.$request->name.'%');
                $query->where('city_id','=','%'.$request->city_id.'%');
                $query->where('blood_type_id','=','%'.$request->blood_type_id.'%');
            })->latest()->paginate(5);
        return view('clients.index', compact('records'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Client::findOrFail($id);
        $record->delete();
        return redirect('/client');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function activate(Request $request)
    {
        $client=Client::findOrFail($request['id']);
        $client->status=1;
        $client->save();
        return back();
    }

    /**
     * @param Request $request
     * @return string
     */
    public function deactivate(Request $request)
    {
        $client=Client::findOrFail($request['id']);
        $client->status=0;
        $client->save();
        return back();
    }
}
