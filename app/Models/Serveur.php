<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serveur extends Model
{
    use HasFactory;
    protected $table = 'serveurs';
    protected $fillable = ['id','nom','role'];
    public function commandes() 
{ 
    return $this->hasMany(Commande::class); 
}
}
