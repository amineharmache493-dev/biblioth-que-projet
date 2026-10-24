<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;
use function Laravel\Prompts\autocomplete;

class AuteurController extends Controller
{
    public function CreateAuteur()
    {
        Auteur::create([
            'nom' => 'harmache',
            'prenom' => 'amine',
            'email' => 'amine.harmache@example.com',
            'date_naissance' => '2007-02-24',
            'nationalite' => 'Marocaine',
            'actif' => true,
        ]);

        Auteur::create([
            'nom' => 'anass',
            'prenom' => 'ghazali',
            'email' => 'anass.ghazali@example.com',
            'date_naissance' => '2002-08-25',
            'nationalite' => 'Marocaine',
            'actif' => true,
        ]);

        Auteur::create([
            'nom' => 'Martin',
            'prenom' => 'Jean',
            'email' => 'jean.martin@example.com',
            'date_naissance' => '1978-02-10',
            'nationalite' => 'Française',
            'actif' => true,
        ]);

        Auteur::create([
            'nom' => 'Haddad',
            'prenom' => 'Nadia',
            'email' => 'nadia.haddad@example.com',
            'date_naissance' => '1988-11-03',
            'nationalite' => 'Marocaine',
            'actif' => true,
        ]);

        Auteur::create([
            'nom' => 'Dupont',
            'prenom' => 'Pierre',
            'email' => 'pierre.dupont@example.com',
            'date_naissance' => null,
            'nationalite' => 'Française',
            'actif' => true,
        ]);
    }

    public function index()
    {
        $auteurs = Auteur::all();
        return view('auteurs.index', compact('auteurs'));
    }

    public function create()
    {
        $auteurs = Auteur::all();
        return view('auteurs.create', compact('auteurs'));
    }

    public function store(Request $request)
    {
       $auteur = new Auteur();

           $auteur->nom = $request->nom;
           $auteur->prenom = $request->prenom;
           $auteur->email= $request->email;
           $auteur->date_naissance = $request->date_naissance;
           $auteur->nationalite = $request->nationalite;
           $auteur->actif = $request->has('actif');
           
           $auteur->save();
           return redirect()->route('auteurs.index');
    }

    public function show(string $id)
    {
        $auteur = Auteur::findOrFail($id);
        return view('auteurs.show', compact('auteur'));
    }

    public function edit(string $id)
    {
        $auteur = Auteur::findOrFail($id);
        return view('auteurs.edit', compact('auteur'));
    }

    public function update(Request $request, string $id)
    {
        $auteur = Auteur::findOrFail($id);

           $auteur->nom = $request->nom;
           $auteur->prenom = $request->prenom;
           $auteur->email= $request->email;
           $auteur->date_naissance = $request->date_naissance;
           $auteur->nationalite = $request->nationalite;
           $auteur->actif = $request->has('actif');
           $auteur->save();
          
        return redirect()->route('auteurs.index');
    }

    public function destroy(string $id)
    {
        $auteur = Auteur::findOrFail($id);
        $auteur->delete();

        return redirect()->route('auteurs.index');
    }
}