<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        "producto_nombre",
        "producto_descripcion",
        "producto_slug",
        "producto_precio",
        "producto_stock",
        "tienda_id"
    ];

    protected $table = "productos";
    public function tienda(){
        return $this->belongsTo(Tienda::class);
    }
}
