<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

  protected $fillable = [
        'slug', 'name'
  ];

  public static function datatables()
  {
        return static::select( 'name', 'slug', 'id' );
  }

  public static function getListPermission()
  {
    $menus = Menu::all();
    $response = [];
    foreach ($menus as $menu) {
      $result = [
        'name' => $menu->name,
        'id' => $menu->id
      ];

      array_push( $response, $result );
    }

   return $response;
  }


}
