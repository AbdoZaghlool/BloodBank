<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_request';
    public $timestamps = true;
    protected $fillable = array('paitant_name', 'paitant_phone', 'paitant_age', 'bags_num', 'details', 'hospital_name', 'hospital_address', 'latitude');

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function bloodType()
    {
        return $this->belongsTo('BloodType');
    }

    public function client()
    {
        return $this->belongsTo('Client');
    }

    public function notifications()
    {
        return $this->hasMany('Notification');
    }

}