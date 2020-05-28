<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function customer() {
        return $this->belongsTo('App\Customer','customer_id','id');
    }

    public function flowers(){
        return $this->belongsToMany('App\Flower')->using('App\Order');
    }
}
