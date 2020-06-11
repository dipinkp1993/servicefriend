<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicerequest extends Model
{
   

    protected $fillable = [
        'customerid','serviceid','catname', 'vname', 'vmodel','vbrand','sdate','stime','request_status','request_type','service_charge',
    ];

   
}
