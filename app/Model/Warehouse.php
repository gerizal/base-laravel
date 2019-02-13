<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    protected $table = 'warehouse';
    protected $fillable = [
        'id','name','location','created_at','updated_at'
    ];
     public static function datatables()
    {
        return static::select( 'id','name','location','created_at','updated_at');
    }
}
