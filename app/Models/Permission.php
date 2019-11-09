<?php
namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
