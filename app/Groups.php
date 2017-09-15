<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //
    protected $fillable=['name'];
    public function contacts(){
        return $this->hasMany('App\Contacts','group_id');
    }
}
