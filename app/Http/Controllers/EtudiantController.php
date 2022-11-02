<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::orderBy("nom", "asc")->paginate(5);
        return view("etudiant", compact("etudiants"));
    }

    public function create()
    {
        $classes = Classe::all();
        return view("createEtudiant", compact("classes"));
    }

    public function store(Request  $request)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required",
        ]);

         Etudiant::create($request->all());
        // dd(Etudiant::create($request->all()));
         return back()->with("success","Etudiant ajouter avec succès!");
    }

    public function delete(Etudiant $etudiant){
        $etudiant->delete();
        
        return back()->with("successDelete","Etudiant supprimer avec succès!");
    }
   
}
