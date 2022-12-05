<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Evento extends Model implements Auditable
{
    use HasFactory, AuditableTrait;
    protected $guarded = [];

    public function paquete()
    {
        return $this->belongsToMany(Paquete::class);
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class,'evento_id','id');
    }

    public function imagenes(){
        return $this->hasMany(Image::class, 'evento_id', 'id');
    }

    public function abonos(){
        return $this->hasMany(Abono::class);
    }
}
