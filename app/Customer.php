<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminService;

class Customer extends Model
{
    public function admin_services ()
    {
    	return $this->hasMany(AdminService::class);
    }
}
