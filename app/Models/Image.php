<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Image extends Model implements Auditable
{
    use HasFactory, AuditableTrait;
    protected $guarded = [];
    
    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
