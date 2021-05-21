<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serveur;

class ServerController extends Controller
{
    //
    public function index()
    {
         $serveurs = Serveur::Paginate(5);
         return view('serveur.index',compact('serveurs'));
    }
    public function create()
    {      
        return view('serveur.create');
    }
 
   public function store(Request $request)
   {
       $request->validate([
        'nom' => 'required|string|max:10',
       ]);
       
        Serveur::create([
            'nom' => $request->nom,
            'role' => 'serveur',
        ]);

      // Serveur::create($request->all());
       return redirect()->route('serveurs.index')->with('info', 'Serveur added successfully');
   }
   public function destroy(Serveur $serveur)
   {
       $serveur->delete();
       return back()->with('info', 'Le Serveur ta bien été supprimé dans la base de données.');
   }

}
