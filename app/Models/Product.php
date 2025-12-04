<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ID_producto';
    protected $fillable = [
        'nombre', 'marca', 'descripcion', 'precio', 'imagen', 'estado', 'ID_categoria', 'ID_tienda'
    ];
}
