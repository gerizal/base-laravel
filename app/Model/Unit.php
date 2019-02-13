<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = 'unit';
    protected $fillable = [
        'id','name','description','created_at','updated_at'
    ];
     public static function datatables()
    {
        return static::select( 'id','name','description','created_at','updated_at');
    }
}
