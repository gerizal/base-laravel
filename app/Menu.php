<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menus';
    protected $fillable = [
        'name', 'icon','submenu'
    ];
     public static function datatables()
    {
        return static::select( 'id','name','display_name','icon','created_at','updated_at');
    }
}
