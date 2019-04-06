<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    // added this here
    protected $fillable = [
        'bill_id','user_id','product_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product() 
    {
        return $this->belongsTo('App\Product');
    }
}
