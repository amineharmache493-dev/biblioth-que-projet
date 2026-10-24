<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'auteur</title>
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
    <!-- Contenu -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-white py-3">
                        <h4 class="mb-0 font-weight-bold">
                            Détail de l'auteur
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <!-- Nom -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <small class="text-muted">
                                        Nom
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $auteur->nom }}
                                    </h5>
                                </div>
                            </div>
                            <!-- Prénom -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <small class="text-muted">
                                        Prénom
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $auteur->prenom }}
                                    </h5>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <small class="text-muted">
                                        Email
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $auteur->email }}
                                    </h5>
                                </div>
                            </div>
                            <!-- Date de naissance -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <small class="text-muted">
                                        Date de naissance
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $auteur->date_naissance?->format('Y-m-d') ?? '-' }}
                                    </h5>
                                </div>
                            </div>
                            <!-- Nationalité -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <small class="text-muted">
                                        Nationalité
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $auteur->nationalite ?? '-' }}
                                    </h5>
                                </div>
                            </div>
                            <!-- Statut -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <small class="text-muted">
                                        Statut
                                    </small>
                                    <div class="mt-2">
                                        @if ($auteur->actif)
                                            <span class="badge badge-success px-3 py-2">
                                                Actif
                                            </span>
                                        @else
                                            <span class="badge badge-danger px-3 py-2">
                                                Inactif
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- Livres -->
                        <h5 class="mb-3 font-weight-bold">
                            Livres de cet auteur
                        </h5>
                        @if ($auteur->livres->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Titre</th>
                                            <th>Prix</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($auteur->livres as $livre)
                                            <tr>
                                                <td class="text-muted">
                                                    {{ $livre->id }}
                                                </td>
                                                <td class="text-muted">
                                                    {{ $livre->titre }}
                                                </td>
                                                <td class="text-muted">
                                                    {{ $livre->prix }} DH
                                                </td>
                                                <td class="text-muted">
                                                    {{ $livre->stock }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                Aucun livre associé à cet auteur.
                            </div>
                        @endif
                        <!-- Buttons -->
                        <div class="mt-4">
                            <a href="{{ route('auteurs.edit', $auteur->id) }}"
                               class="btn btn-warning shadow-sm px-4 rounded-pill font-weight-bold mr-2">
                                Modifier
                            </a>
                            <a href="{{ route('auteurs.index') }}"
                               class="btn btn-light border shadow-sm px-4 rounded-pill font-weight-bold">
                                Retour à la liste
                            </a>
                        </div>
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