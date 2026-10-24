<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bibliothèque</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">

    <!-- Header -->
    <header class="bg-white border-bottom shadow-sm">

        <nav class="navbar navbar-expand-lg navbar-light py-3">

            <div class="container">

                <!-- Logo -->
                <a href="{{ url('/') }}"
                   class="navbar-brand font-weight-bold text-primary"
                   style="font-size: 1.5rem;">
                    📚 Bibliothèque
                </a>

                <!-- Right Side -->
                <div class="d-flex align-items-center ml-auto">

                    @guest

                        <a href="{{ route('login') }}"
                           class="btn btn-outline-primary btn-sm mr-2 shadow-sm px-3 rounded-pill font-weight-bold">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                           class="btn btn-primary btn-sm shadow-sm px-3 rounded-pill font-weight-bold">
                            Register
                        </a>

                    @endguest


                    @auth

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

                        <form method="POST"
                              action="{{ route('logout') }}"
                              class="m-0">

                            @csrf

                            <button type="submit"
                                    class="btn btn-danger btn-sm shadow-sm px-3 rounded-pill font-weight-bold">
                                Déconnexion
                            </button>

                        </form>

                    @endauth

                </div>

            </div>

        </nav>

    </header>


    <!-- Main Content -->
    <main>

        <section class="py-5">

            <div class="container">

                <div class="row align-items-center"
                     style="min-height: 70vh;">

                    <!-- Left Content -->
                    <div class="col-lg-7 mb-5 mb-lg-0">

                        <span class="badge badge-primary px-3 py-2 mb-3">
                            Système de gestion
                        </span>

                        <h1 class="display-4 font-weight-bold text-dark mb-3">

                            Bienvenue dans votre

                            <span class="text-primary">
                                bibliothèque
                            </span>

                        </h1>

                        <p class="lead text-muted mb-4">

                            Une plateforme simple et moderne pour gérer
                            vos auteurs et vos livres efficacement.

                        </p>


                        <!-- Buttons -->
                        <div class="d-flex flex-wrap align-items-center">

                            <a href="{{ route('auteurs.index') }}"
                               class="btn btn-primary btn-lg mr-3 mb-2 shadow-sm px-4 rounded-pill font-weight-bold">
                                👤 Gérer les auteurs
                            </a>

                            <a href="{{ route('livres.index') }}"
                               class="btn btn-info btn-lg mb-2 shadow-sm px-4 rounded-pill font-weight-bold">
                                📖 Gérer les livres
                            </a>

                        </div>

                    </div>


                    <!-- Right Card -->
                    <div class="col-lg-5">

                        <div class="card border-0 shadow-lg rounded-lg">

                            <div class="card-body p-4 p-lg-5">

                                <div class="text-center mb-4">

                                    <div class="display-3 mb-3">
                                        📚
                                    </div>

                                    <h3 class="font-weight-bold mb-2">
                                        Gestion de bibliothèque
                                    </h3>

                                    <p class="text-muted mb-0">
                                        Organisez facilement vos ressources.
                                    </p>

                                </div>


                                <hr class="my-4">


                                <div class="row text-center">

                                    <!-- Auteurs -->
                                    <div class="col-6">

                                        <div class="font-weight-bold h4 text-primary mb-1">
                                            Auteurs
                                        </div>

                                        <small class="text-muted">
                                            Gestion des auteurs
                                        </small>

                                    </div>


                                    <!-- Livres -->
                                    <div class="col-6 border-left">

                                        <div class="font-weight-bold h4 text-success mb-1">
                                            Livres
                                        </div>

                                        <small class="text-muted">
                                            Gestion des livres
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>


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
