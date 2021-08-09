<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class C_carrera extends Model
{
    use HasFactory;
    protected $table = "c_carreras";

    const CREATED_AT = "fcreacion";
    const UPDATED_AT = "fmodificacion";

    protected $fillable = [
      "id",
      "nombre",
      "nombre_corto",
      "estatus",
      "fcreacion",
      "fmodificacion",
      'idmodalidad'
    ];

    
    public static function getForPagination($ofset,$limit)
    {
      $countData = self::count();

      $data = self::
      select('id','nombre','nombre_corto','estatus','fcreacion','fmodificacion','idmodalidad')
      ->orderBy('nombre')
      ->offset($ofset)
      ->limit($limit)->get();
      return[
        'countData'=>$countData,
        'data'=>$data
      ];
    }
}
