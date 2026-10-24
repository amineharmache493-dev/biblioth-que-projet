<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Auteur;

class LivreController extends Controller
{
    public function CreateLivre() {
    
     Livre::create([
    'auteur_id' => 1,
    'titre' => 'Laravel',
    'isbn' => '9780000000001',
    'prix' => 250.00,
    'stock' => 10,
    'date_publication' => '2023-03-15',
    'disponible' => true,
]);

     Livre::create([
    'auteur_id' => 1,
    'titre' => 'PHP',
    'isbn' => '9780000000002',
    'prix' => 320.50,
    'stock' => 5,
    'date_publication' => '2022-06-20',
    'disponible' => true,
]);

     Livre::create([
    'auteur_id' => 2,
    'titre' => 'JavaScript',
    'isbn' => '9780000000003',
    'prix' => 180.00,
    'stock' => 12,
    'date_publication' => '2024-01-10',
    'disponible' => true,
]);

    Livre::create([
    'auteur_id' => 2,
    'titre' => 'Html',
    'isbn' => '9780000000004',
    'prix' => 450.00,
    'stock' => 3,
    'date_publication' => '2021-09-05',
    'disponible' => true,
]);

     Livre::create([
    'auteur_id' => 3,
    'titre' => 'Python',
    'isbn' => '9780000000005',
    'prix' => 275.00,
    'stock' => 0,
    'date_publication' => '2023-11-12',
    'disponible' => false,
]);

      Livre::create([
    'auteur_id' => 3,
    'titre' => 'Algorithmes',
    'isbn' => '9780000000006',
    'prix' => 520.00,
    'stock' => 7,
    'date_publication' => '2020-04-18',
    'disponible' => true,
]);

     Livre::create([
    'auteur_id' => 4,
    'titre' => 'Bases de donnees SQL',
    'isbn' => '9780000000007',
    'prix' => 150.00,
    'stock' => 20,
    'date_publication' => '2024-05-25',
    'disponible' => true,
]);

     Livre::create([
    'auteur_id' => 4,
    'titre' => 'React',
    'isbn' => '9780000000008',
    'prix' => 390.00,
    'stock' => 8,
    'date_publication' => '2025-02-14',
    'disponible' => true,
]);

     Livre::create([
    'auteur_id' => 5,
    'titre' => 'Css',
    'isbn' => '9780000000009',
    'prix' => 210.00,
    'stock' => 0,
    'date_publication' => null,
    'disponible' => false,
]);

     Livre::create([
    'auteur_id' => 5,
    'titre' => 'Java',
    'isbn' => '9780000000010',
    'prix' => 600.00,
    'stock' => 15,
    'date_publication' => '2025-08-30',
    'disponible' => true,
]);

    }

   public function index()
   {
    $livres = Livre::with('auteur')->orderBy('id', 'desc')->paginate(10);
    return view('livres.index', compact('livres'));
    }

   public function create()
{
    $auteurs = Auteur::all();

    return view('livres.create', compact('auteurs'));
}

    public function store(Request $request)
{
    $request->validate([
        'auteur_id' => ['required', 'exists:auteurs,id'],
        'titre' => ['required', 'string', 'max:200'],
        'isbn' => ['required', 'string', 'max:20', 'unique:livres,isbn'],
        'prix' => ['required', 'numeric', 'min:0'],
        'stock' => ['required', 'integer', 'min:0'],
        'date_publication' => ['nullable', 'date'],
    ]);

    Livre::create([
        'auteur_id' => $request->auteur_id,
        'titre' => $request->titre,
        'isbn' => $request->isbn,
        'prix' => $request->prix,
        'stock' => $request->stock,
        'date_publication' => $request->date_publication,
    ]);

    return redirect()->route('livres.index');
}

    public function show(string $id){
    $livre = Livre::findOrFail($id);
    return view('livres.show', compact('livre'));
    }


   public function edit(string $id) {
    $livre = Livre::findOrFail($id);
    $auteurs = Auteur::all();
    return view('livres.edit', compact('livre', 'auteurs'));
    }

    public function update(Request $request, string $id) {
    $livre= Livre::findOrFail($id);
    
    $livre->auteur_id = $request->auteur_id;
    $livre->titre = $request->titre;
    $livre->isbn = $request->isbn;
    $livre->prix = $request->prix;
    $livre->stock = $request->stock;
    $livre->date_publication = $request->date_publication;
    $livre->disponible = $request->has('disponible');

    $livre->save();
    return redirect()->route('livres.index');
    }

    public function destroy(string $id)
   {
    $livre = Livre::findOrFail($id);
    $livre->delete();
    return redirect()->route('livres.index');
    }
}
