<?php

namespace App\Http\Controllers;

use App\Models\Livre;

class ConditionLivre extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        return $livres;
    }

    public function prix200()
    {
        $livres = Livre::where('prix', '>', 200)->get();
        return $livres;
    }

    public function disponible()
    {
        $livres = Livre::where('disponible', true)->get();
        return $livres;
    }

    public function stock0()
    {
        $livres = Livre::where('stock', 0)->get();
        return $livres;
    }

    public function prixDesc()
    {
        $livres = Livre::orderBy('prix', 'desc')->get();
        return $livres;
    }

    public function isbn1()
    {
        $livre = Livre::where('isbn', '9780000000001')->first();
        return $livre;
    }

    public function isbn2()
    {
        $livre = Livre::where('isbn', '9780000000002')->first();
        return $livre;
    }

    public function isbn3()
    {
        $livre = Livre::where('isbn', '9780000000003')->first();
        return $livre;
    }
}