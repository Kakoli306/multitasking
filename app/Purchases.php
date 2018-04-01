<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchases extends Model
{
    protected $fillable = ['first_name', 'last_name','email', 'number','address','permission_status','post_id'];
}
