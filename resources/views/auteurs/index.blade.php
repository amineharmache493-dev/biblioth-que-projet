<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des auteurs</title>
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
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0 font-weight-bold">
                Liste des auteurs
            </h1>
            <a href="{{ route('auteurs.create') }}"
               class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold">
                Ajouter un auteur
            </a>
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Date naissance</th>
                                <th>Nationalité</th>
                                <th>Actif</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auteurs as $auteur)
                                <tr>
                                    <td class="text-muted">
                                        {{ $auteur->id }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $auteur->nom }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $auteur->prenom }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $auteur->email }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $auteur->date_naissance?->format('Y-m-d') ?? '-' }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $auteur->nationalite ?? '-' }}
                                    </td>
                                    <td class="text-muted">
                                        @if ($auteur->actif)
                                            <span class="btn btn-sm btn-info">
                                                Oui
                                            </span>
                                        @else
                                            <span class="btn btn-sm btn-danger">
                                                Non
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('auteurs.show', $auteur->id) }}"
                                           class="btn btn-sm btn-info">
                                            Voir
                                        </a>
                                        <a href="{{ route('auteurs.edit', $auteur->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Modifier
                                        </a>
                                        <form action="{{ route('auteurs.destroy', $auteur->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Voulez-vous vraiment supprimer cet auteur ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white border-top py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0 font-weight-bold">
                © {{ date('Y') }} Bibliothèque — Système de gestion
            </p>
        </div>
    </footer>
</body>
</html>