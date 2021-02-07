<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserDetail extends Authenticatable
{
    use HasFactory;
    protected $fillable =['user_name','user_email','gender','password'];

    public function profiles(){
    	return $this->hasOne(UserProfile::class,'user_id');
    }
    
}
