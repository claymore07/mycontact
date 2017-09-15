<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
    protected $fillable=[
      'name', 'email', 'phone','group_id','address','company','photo', 'user_id'
    ];

    public function group(){
        return $this->belongsTo('App\Groups');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
