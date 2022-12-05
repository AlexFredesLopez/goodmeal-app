<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'horario_retiro'
    ];


    protected $table = "tiendas";

    protected $primary_key = "id";


    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
