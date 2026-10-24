<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Créer un compte - Bibliothèque</title>

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


    <!-- Register -->
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-7 col-lg-5">

                <div class="card border-0 shadow-sm rounded-lg">

                    <div class="card-body p-4 p-lg-5">

                        <!-- Title -->
                        <div class="text-center mb-4">

                            <div class="display-4 mb-3">
                                👤
                            </div>

                            <h3 class="font-weight-bold text-dark mb-2">
                                Créer un compte
                            </h3>

                            <p class="text-muted mb-0">
                                Créez votre compte pour accéder à la bibliothèque.
                            </p>

                        </div>


                        <!-- Register Form -->
                        <form method="POST"
                              action="{{ route('register') }}">

                            @csrf


                            <!-- Name -->
                            <div class="form-group">

                                <label for="name"
                                       class="font-weight-bold text-muted">
                                    Nom
                                </label>

                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name">

                                @if ($errors->get('name'))

                                    <div class="text-danger small mt-2">

                                        @foreach ($errors->get('name') as $message)

                                            <div>{{ $message }}</div>

                                        @endforeach

                                    </div>

                                @endif

                            </div>


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
                                    autocomplete="new-password">

                                @if ($errors->get('password'))

                                    <div class="text-danger small mt-2">

                                        @foreach ($errors->get('password') as $message)

                                            <div>{{ $message }}</div>

                                        @endforeach

                                    </div>

                                @endif

                            </div>


                            <!-- Confirm Password -->
                            <div class="form-group">

                                <label for="password_confirmation"
                                       class="font-weight-bold text-muted">
                                    Confirmer le mot de passe
                                </label>

                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    required
                                    autocomplete="new-password">

                                @if ($errors->get('password_confirmation'))

                                    <div class="text-danger small mt-2">

                                        @foreach ($errors->get('password_confirmation') as $message)

                                            <div>{{ $message }}</div>

                                        @endforeach

                                    </div>

                                @endif

                            </div>


                            <!-- Actions -->
                            <div class="d-flex align-items-center justify-content-between mt-4">

                                <a href="{{ route('login') }}"
                                   class="text-primary small font-weight-bold">
                                    Déjà inscrit ?
                                </a>

                                <button type="submit"
                                        class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold">
                                    Créer le compte
                                </button>

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