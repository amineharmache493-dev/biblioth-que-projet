<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion - Bibliothèque</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-light bg-white border-bottom shadow-sm py-3">

        <div class="container">

            <a href="{{ url('/') }}"
               class="navbar-brand font-weight-bold text-primary"
               style="font-size: 1.5rem;">
                📚 Bibliothèque
            </a>

        </div>

    </nav>


    <!-- Login -->
    <div class="container py-3">

        <div class="row justify-content-center">

            <div class="col-md-7 col-lg-5">

                <div class="card border-0 shadow-sm rounded-lg">

                    <div class="card-body p-4 p-lg-5">

                        <!-- Title -->
                        <div class="text-center mb-4">

                            <div class="display-4 mb-3">
                                🔐
                            </div>

                            <h3 class="font-weight-bold text-dark mb-2">
                                Connexion
                            </h3>

                            <p class="text-muted mb-0">
                                Connectez-vous à votre espace bibliothèque.
                            </p>

                        </div>


                        <!-- Session Status -->
                        @if (session('status'))

                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>

                        @endif


                        <!-- Login Form -->
                        <form method="POST"
                              action="{{ route('login') }}">

                            @csrf


                            <!-- Email -->
                            <div class="form-group">

                                <label for="email"
                                       class="font-weight-bold text-muted">
                                    Email
                                </label>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username">

                                @if ($errors->get('email'))

                                    <div class="text-danger small mt-2">

                                        @foreach ($errors->get('email') as $message)

                                            <div>{{ $message }}</div>

                                        @endforeach

                                    </div>

                                @endif

                            </div>


                            <!-- Password -->
                            <div class="form-group">

                                <label for="password"
                                       class="font-weight-bold text-muted">
                                    Mot de passe
                                </label>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required
                                    autocomplete="current-password">

                                @if ($errors->get('password'))

                                    <div class="text-danger small mt-2">

                                        @foreach ($errors->get('password') as $message)

                                            <div>{{ $message }}</div>

                                        @endforeach

                                    </div>

                                @endif

                            </div>


                            <!-- Remember Me -->
                            <div class="form-check mb-4">

                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    class="form-check-input"
                                    name="remember">

                                <label for="remember_me"
                                       class="form-check-label text-muted">
                                    Se souvenir de moi
                                </label>

                            </div>


                            <!-- Actions -->
                            <div class="d-flex align-items-center justify-content-between">

                                @if (Route::has('password.request'))

                                    <a href="{{ route('password.request') }}"
                                       class="text-primary small font-weight-bold">
                                        Mot de passe oublié ?
                                    </a>

                                @endif

                                <button type="submit"
                                        class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold">
                                    Se connecter
                                </button>

                            </div>

                        </form>


                        <!-- Register -->
                        @if (Route::has('register'))

                            <hr class="my-4">

                            <div class="text-center">

                                <span class="text-muted">
                                    Vous n'avez pas encore de compte ?
                                </span>

                                <a href="{{ route('register') }}"
                                   class="text-primary font-weight-bold ml-1">
                                    Créer un compte
                                </a>

                            </div>

                        @endif

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