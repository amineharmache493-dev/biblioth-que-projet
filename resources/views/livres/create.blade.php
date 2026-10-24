<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm py-3">
        <div class="container">
            <a href="{{ url('/') }}"
               class="navbar-brand font-weight-bold text-primary"
               style="font-size: 1.5rem;">
                📚 Bibliothèque
            </a>
            <!-- Right Side -->
            <div class="d-flex align-items-center ml-auto">
                <span class="text-muted mr-4">
                    Bonjour,
                    <strong class="text-dark">
                        {{ Auth::user()->name }}
                    </strong>
                </span>
                <a href="{{ route('dashboard') }}"
                   class="btn btn-outline-primary btn-sm mr-2 shadow-sm px-3 rounded-pill font-weight-bold">
                    Dashboard
                </a>
                <a href="{{ route('profile.edit') }}"
                   class="btn btn-outline-primary btn-sm mr-2 shadow-sm px-3 rounded-pill font-weight-bold">
                    Mon profil
                </a>
                <form method="POST"
                      action="{{ route('logout') }}"
                      class="m-0">
                    @csrf
                    <button type="submit"
                            class="btn btn-danger btn-sm shadow-sm px-3 rounded-pill font-weight-bold">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Formulaire -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h4 class="mb-0 font-weight-bold">
                            Ajouter un livre
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('livres.store') }}"
                              method="POST">
                            @csrf
                            <!-- Auteur -->
                            <div class="form-group">
                                <label for="auteur_id"
                                       class="text-muted font-weight-bold">
                                    Auteur
                                </label>
                                <select
                                    name="auteur_id"
                                    id="auteur_id"
                                    class="form-control"
                                    required>
                                    <option value="">
                                        -- Choisir un auteur --
                                    </option>
                                    @foreach ($auteurs as $auteur)
                                        <option
                                            value="{{ $auteur->id }}"
                                            {{ old('auteur_id') == $auteur->id ? 'selected' : '' }}>
                                            {{ $auteur->nom }} {{ $auteur->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Titre -->
                            <div class="form-group">
                                <label for="titre"
                                       class="text-muted font-weight-bold">
                                    Titre
                                </label>
                                <input
                                    type="text"
                                    name="titre"
                                    id="titre"
                                    class="form-control"
                                    value="{{ old('titre') }}"
                                    placeholder="Entrez le titre du livre"
                                    required>
                            </div>
                            <!-- ISBN -->
                            <div class="form-group">
                                <label for="isbn"
                                       class="text-muted font-weight-bold">
                                    ISBN
                                </label>
                                <input
                                    type="text"
                                    name="isbn"
                                    id="isbn"
                                    class="form-control"
                                    value="{{ old('isbn') }}"
                                    placeholder="Ex: 9780000000011"
                                    required>
                            </div>
                            <!-- Prix + Stock -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prix"
                                               class="text-muted font-weight-bold">
                                            Prix
                                        </label>
                                        <div class="input-group">
                                            <input
                                                type="number"
                                                step="0.01"
                                                min="0"
                                                name="prix"
                                                id="prix"
                                                class="form-control"
                                                value="{{ old('prix') }}"
                                                placeholder="0.00"
                                                required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    DH
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock"
                                               class="text-muted font-weight-bold">
                                            Stock
                                        </label>
                                        <input
                                            type="number"
                                            min="0"
                                            name="stock"
                                            id="stock"
                                            class="form-control"
                                            value="{{ old('stock') }}"
                                            placeholder="0"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <!-- Date publication -->
                            <div class="form-group">

                                <label for="date_publication"
                                       class="text-muted font-weight-bold">
                                    Date de publication
                                </label>

                                <input
                                    type="date"
                                    name="date_publication"
                                    id="date_publication"
                                    class="form-control"
                                    value="{{ old('date_publication') }}">

                            </div>
                            <!-- Disponibilité -->
                            <div class="form-check mb-4">
                                <input
                                    type="checkbox"
                                    name="disponible"
                                    id="disponible"
                                    value="1"
                                    class="form-check-input"
                                    {{ old('disponible') ? 'checked' : '' }}>
                                <label
                                    for="disponible"
                                    class="form-check-label text-muted font-weight-bold">
                                    Livre disponible
                                </label>
                            </div>
                            <!-- Buttons -->
                            <div class="d-flex align-items-center">
                                <button
                                    type="submit"
                                    class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold mr-2">
                                    Ajouter le livre
                                </button>
                                <a
                                    href="{{ route('livres.index') }}"
                                    class="btn btn-light border shadow-sm px-4 rounded-pill font-weight-bold">

                                    Retour

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Footer -->
    <footer class="bg-white border-top py-4 mt-5">

        <div class="container text-center">

            <p class="text-muted mb-0 font-weight-bold">
                © {{ date('Y') }} Bibliothèque — Système de gestion
            </p>

        </div>

    </footer>
</body>

</html>