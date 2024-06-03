<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model {
    use HasFactory;

    protected $fillable = ['descripcion', 'user_id', 'completed', 'categoria_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
}