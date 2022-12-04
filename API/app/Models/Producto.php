<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        "producto_nombre",
        "producto_slug",
        "producto_descripcion",
        "producto_precio",
        "producto_stock",
        "tienda_id"
    ];


    public function tienda(){
        $this->belongsTo(Tienda::class);
    }
}
