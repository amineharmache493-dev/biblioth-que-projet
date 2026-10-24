<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un auteur</title>
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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-white py-3">
                        <h4 class="mb-0 font-weight-bold">
                            Ajouter un auteur
                        </h4>

                    </div>
                    <div class="card-body p-4">

                        <form action="{{ route('auteurs.store') }}"
                              method="POST">
                            @csrf
                            <div class="form-group">

                                <label for="nom"
                                       class="font-weight-bold text-muted">
                                    Nom
                                </label>

                                <input
                                    type="text"
                                    name="nom"
                                    id="nom"
                                    class="form-control"
                                    value="{{ old('nom') }}"
                                    placeholder="Entrez le nom"
                                    required>

                            </div>

                            <div class="form-group">

                                <label for="prenom"
                                       class="font-weight-bold text-muted">
                                    Prénom
                                </label>

                                <input
                                    type="text"
                                    name="prenom"
                                    id="prenom"
                                    class="form-control"
                                    value="{{ old('prenom') }}"
                                    placeholder="Entrez le prénom"
                                    required>

                            </div>

                            <div class="form-group">

                                <label for="email"
                                       class="font-weight-bold text-muted">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="exemple@email.com"
                                    required>

                            </div>
                            <div class="form-group">

                                <label for="date_naissance"
                                       class="font-weight-bold text-muted">
                                    Date de naissance
                                </label>

                                <input
                                    type="date"
                                    name="date_naissance"
                                    id="date_naissance"
                                    class="form-control"
                                    value="{{ old('date_naissance') }}">

                            </div>


                            <!-- Nationalité -->
                            <div class="form-group">

                                <label for="nationalite"
                                       class="font-weight-bold text-muted">
                                    Nationalité
                                </label>

                                <input
                                    type="text"
                                    name="nationalite"
                                    id="nationalite"
                                    class="form-control"
                                    value="{{ old('nationalite') }}"
                                    placeholder="Ex: Marocaine">

                            </div>


                            <!-- Actif -->
                            <div class="form-check mb-4">

                                <input
                                    type="checkbox"
                                    name="actif"
                                    id="actif"
                                    value="1"
                                    class="form-check-input"
                                    checked>

                                <label for="actif"
                                       class="form-check-label font-weight-bold text-muted">
                                    Auteur actif
                                </label>

                            </div>


                            <!-- Buttons -->
                            <div class="d-flex align-items-center">

                                <button type="submit"
                                        class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold mr-2">
                                    Ajouter
                                </button>

                                <a href="{{ route('auteurs.index') }}"
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