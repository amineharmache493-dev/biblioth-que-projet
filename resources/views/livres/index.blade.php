<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste des livres</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm py-3">

        <div class="container">

            <!-- Logo -->
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


    <!-- Contenu original -->
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-1">
                    Liste des livres
                </h1>
            </div>
            
            <a href="{{ route('livres.create') }}"
               class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold">
                Ajouter un livre
            </a>

        </div>


        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle mb-0">

                        <thead class="thead-dark">

                            <tr>
                                <th>ID</th>
                                <th>Auteur</th>
                                <th>Titre</th>
                                <th>ISBN</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Date publication</th>
                                <th>Disponible</th>
                                <th>Actions</th>
                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($livres as $livre)

                                <tr>

                                    <td class="text-muted">
                                        {{ $livre->id }}
                                    </td>


                                    <td class="text-muted">
                                        {{ $livre->auteur->nom }}
                                        {{ $livre->auteur->prenom }}
                                    </td>


                                    <td class="text-muted">
                                        {{ $livre->titre }}
                                    </td>


                                    <td class="text-muted">
                                        {{ $livre->isbn }}
                                    </td>


                                    <td class="text-muted">
                                        <strong>
                                            {{ $livre->prix }} DH
                                        </strong>
                                    </td>


                                    <td class="text-muted">

                                        @if ($livre->stock > 0)

                                            <span class="badge badge-success">
                                                {{ $livre->stock }}
                                            </span>

                                        @else

                                            <span class="badge badge-danger">
                                                0
                                            </span>

                                        @endif

                                    </td>


                                    <td class="text-muted">
                                        {{ $livre->date_publication?->format('Y-m-d') ?? '-' }}
                                    </td>


                                    <td class="text-muted">

                                        @if ($livre->disponible)

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

                                        <a href="{{ route('livres.show', $livre->id) }}"
                                           class="btn btn-sm btn-info">
                                            Voir
                                        </a>


                                        <a href="{{ route('livres.edit', $livre->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Modifier
                                        </a>


                                        <form
                                            action="{{ route('livres.destroy', $livre->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger">
                                                Supprimer
                                            </button>

                                        </form>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="9"
                                        class="text-center py-4">

                                        <div class="alert alert-info mb-0">
                                            Aucun livre trouvé.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        @if ($livres->hasPages())

            <div class="mt-4 d-flex justify-content-center">

                {{ $livres->links() }}

            </div>

        @endif

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
