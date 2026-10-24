<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Détail du livre</title>

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


    <!-- Contenu -->
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white py-3">

                        <h4 class="mb-0 font-weight-bold">
                            Détail du livre
                        </h4>

                    </div>


                    <div class="card-body">

                        <div class="row">

                            <!-- ID -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        ID
                                    </small>

                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $livre->id }}
                                    </h5>

                                </div>

                            </div>


                            <!-- Auteur -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        Auteur
                                    </small>

                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $livre->auteur->nom }}
                                        {{ $livre->auteur->prenom }}
                                    </h5>

                                </div>

                            </div>


                            <!-- Titre -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        Titre
                                    </small>

                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $livre->titre }}
                                    </h5>

                                </div>

                            </div>


                            <!-- ISBN -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        ISBN
                                    </small>

                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $livre->isbn }}
                                    </h5>

                                </div>

                            </div>


                            <!-- Prix -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        Prix
                                    </small>

                                    <h5 class="mb-0 font-weight-bold text-primary">
                                        {{ $livre->prix }} DH
                                    </h5>

                                </div>

                            </div>


                            <!-- Stock -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        Stock
                                    </small>

                                    <div class="mt-2">

                                        @if ($livre->stock > 0)

                                            <span class="badge badge-info px-3 py-2">
                                                {{ $livre->stock }}
                                            </span>

                                        @else

                                            <span class="badge badge-danger px-3 py-2">
                                                0
                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </div>


                            <!-- Date publication -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        Date de publication
                                    </small>

                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $livre->date_publication?->format('Y-m-d') ?? '-' }}
                                    </h5>

                                </div>

                            </div>


                            <!-- Disponibilité -->
                            <div class="col-md-6 mb-4">

                                <div class="border rounded p-3 bg-light">

                                    <small class="text-muted">
                                        Disponibilité
                                    </small>

                                    <div class="mt-2">

                                        @if ($livre->disponible)

                                            <span class="badge badge-info px-3 py-2">
                                                Disponible
                                            </span>

                                        @else

                                            <span class="badge badge-danger px-3 py-2">
                                                Non disponible
                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- Actions -->
                        <div class="mt-2">

                            <a href="{{ route('livres.edit', $livre->id) }}"
                               class="btn btn-warning shadow-sm px-4 rounded-pill font-weight-bold mr-2">
                                Modifier
                            </a>


                            <a href="{{ route('livres.index') }}"
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