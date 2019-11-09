<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        /**$this->middleware('auth')->except(['index', 'show']);
         * $this->middleware('auth', ['only' => ['edit']]);
         */
        $this->middleware('auth')->only(['index', 'create', 'update', 'store', 'destroy', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::paginate(10);
        return view('users.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     * @throws Illuminate\Validation\ValidationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required|max:11',
        ];
        $validator = $this->validate($request, $rules);
        if ($validator) {
            User::create($request->all());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('users.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Illuminate\Http\Request $request
     * @param int $id
     * @return Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,//email unique except this email for this row
            'phone' => 'required|max:11',
        ];
        $validator = $this->validate($request, $rules);
        if ($validator) {
            $record = User::findOrFail($id);
            $record->name=$request['name'];
            $record->email=$request['email'];
            $record->phone=$request['phone'];
            $record->save();
            return redirect('/user')->with('message','success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=User::findOrFail($id);
        $record->delete();
        return redirect('/user')->with('message','successfully deleted');
    }

    public function showResetForm()
    {
        return view('users.reset-password');
    }

    public function changePassword(Request $request)
    {
        dd($request);
        $code= str_random(4);
        $user = User::where('email',$request->email)->first();
        if($user){
            $updateUser= User::where('pin_code',$request->pin_code);
            if($updateUser){

                Mail::to($user->email)
                    ->bcc('abdoabdo20192020@gmail.com')
                    ->send(new ResetPassword($code));

                return ( $code);
            }
        }
    }

    public function updatePassword(Request $request)
    {
        return responseJson(1, 'here we are');
    }
}
