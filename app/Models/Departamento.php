<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable = ['denominacion', 'localidad'];
}
/* protected $table = 'albumes'; //No cumple con la sintasis porque ña tabla deberia de llamarse albums

public function canciones(){
    return $this->belongsToMany(Cancion::class);
    } Cuaando tienen tabla pivote

public function vuelos_destino(){
        return $this->hasMany(Vuelo::class,'destino_id');
    }  Cuando la relación es 1
return $this->belongsTo(Depart::class,'depart_id');clave foranea *
*/
