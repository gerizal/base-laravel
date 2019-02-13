<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'mahasiswa';

    public static function datatables()
	{
	    return static::select( 'nama','id' );
	}
}
