<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'password', 'last_donation_date', 'blood_type_id', 'city_id');

    public function bloodType()
    {
        return $this->belongsTo('BloodType');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function donationRequests()
    {
        return $this->hasMany('DonationRequest');
    }

    public function posts()
    {
        return $this->belongsToMany('Post');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('Governorate');
    }

}