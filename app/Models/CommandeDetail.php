<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeDetail extends Model
{
    use HasFactory;
    protected $table = 'commandes_details';
    protected $fillable = ['id_product', 'quantite','commande_id'];
    public $timestamps = false;
    public function commande() 
    { 
        return $this->belongsTo(Commande::class); 
    }
    public function product() 
    { 
        return $this->belongsTo(Product::class); 
    }
}
