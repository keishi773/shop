<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'goods' => 'required',
        'price' => 'required',
    );

}
