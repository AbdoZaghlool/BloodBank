<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\Notification;
use App\Models\Token;
use PhpParser\Parser\Tokens;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $donations = DonationRequest::all();
        return responseJson(1, 'success', $donations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'paitant_name' => 'required',
            'paitant_age' => 'required:digits',
            'blood_type_id' => 'required',
            'bags_num' => 'required:digits',
            'hospital_address' => 'required',
            'paitant_phone' => 'required:digits',
            'city_id' => 'required'
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $donationRequest = $request->user()->donationRequests()->create($request->all());

        $clientsIds = $donationRequest->city->governorate
            ->clients()->whereHas('bloodTypes', function ($q) use ($donationRequest) {
                $q->where('blood_types.id', $donationRequest->blood_type_id);
            })->pluck('clients.id')->toArray();
        if (count($clientsIds)) {
            $notification = $donationRequest->notifications()->create([
                'title' => 'There is a new request',
                'content' => 'new donation request matchs your preference settings with blood type please take a look '
            ]);

            // attach ids into notification table.
            $notification->clients()->attach($clientsIds);
            $tokens=Token::where('client_id',$clientsIds)->where('token','!=',null)->pluck('token')->toArray();
            if($tokens){
                $title=$notification->title;
                $body=$notification->content;
                $data=[
                    'donation_request_id' => $donationRequest->id
                ];
                notifyByFirebase($title,$body,$tokens,$data);
            }
        }
        return responseJson(1, 'the donation request has been registerd successfully',$donationRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = DonationRequest::find($id);
        return responseJson(1, 'success', $donation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
