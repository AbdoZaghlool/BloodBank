<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $records = Contact::where(function($quary) use($request)
        {
            $quary->where('name','like','%'.$request->name.'%');
        })->paginate(5);
        return view('contacts.index', compact('records'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Contact::findOrFail($id);
        $record->delete();
        return redirect('/contact');
    }

}
