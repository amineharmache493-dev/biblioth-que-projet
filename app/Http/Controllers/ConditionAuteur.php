<?php

namespace App\Http\Controllers;

use App\Models\Auteur;

class ConditionAuteur extends Controller
{
    public function index()
    {
        $auteurs = Auteur::all();
        return $auteurs;
    }

    public function auteur1()
    {
        $auteur = Auteur::find(1);
        return $auteur;
    }
}