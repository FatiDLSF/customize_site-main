<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site_Web extends Model
{
    use HasFactory;

    protected $table = "sites_web";

    protected $fillable = [
        'user_id',
        'dominio',
        'activo',
    ];

    // ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ relaciones con la PK de la tabla ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
    public function sliders()
    {
        // la llave primaria de esta tabla 'sites_web' se propaga en 'sliders'
        // la FK que se propaga en 'sliders' es explícitamente 'site_web_id'
        return $this->hasMany(Slider::class, 'site_web_id'); // 1:N
    }

    // ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ relaciones FK de la tabla ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
    public function users()
    {
        // establece una relación de pertenencia (belongsTo) entre esta tabla 'sites_web' y la tabla 'users'
        // asume que en esta tabla 'sites_web' existe una columna llamada 'user_id' que se utiliza como clave foránea
        return $this->belongsTo(User::class, 'user_id');
    }
}
