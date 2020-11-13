<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Payment extends Model
{
    protected $fillable = ['user_id','email','name','cardnumber','cvc','amount','start_date','end_date','duration','date','month','year'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
