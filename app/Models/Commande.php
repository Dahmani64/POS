<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $fillable = ['user_id','serveur_id','nbr_product', 'total_facture'];
    public function commandes_details() 
{ 
    return $this->hasMany(CommandeDetail::class); 
}

public function serveur() 
    { 
        return $this->belongsTo(Serveur::class); 
    }
}

