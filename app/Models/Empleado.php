<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = ['nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'empleado_rol', 'empleado_id', 'rol_id');
    }
}
