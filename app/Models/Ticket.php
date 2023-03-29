<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ticket extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'titulo' => 'titulo',
            ]
        ];
    }

    protected $fillable = ['titulo', 'slug', 'descripcion', 'foto', 'nombre_persona', 'prioridad'];


}
