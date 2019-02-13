<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    //
    protected $table = 'submenu';
    protected $fillable = [
        'menu_id', 'name','link'
    ];
}
