<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = "sliders";

    protected $fillable = [
        'site_web_id',
        'titulo',
        'imagen',
        'link',
        'spam',
        'activo',
    ];

    // ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ relaciones con las FK ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
    public function sites_web()
    {
        // establece una relación de pertenencia (belongsTo) entre esta tabla 'sliders' y la tabla 'sites_web'
        // asume que en esta tabla 'sliders' existe una columna llamada 'site_web_id' que se utiliza como clave foránea
        return $this->belongsTo(Site_web::class, 'site_web_id', 'id');
    }
}
