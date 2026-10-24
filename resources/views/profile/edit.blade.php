<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon profil - {{ config('app.name', 'Bibliothèque') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">

    <!-- Navbar -->
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
                    <strong class="text-dark">{{ Auth::user()->name }}</strong>
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


    <!-- Main -->
    <main class="container py-5">

        <!-- Welcome -->
        <div class="mb-5">

            <span class="badge badge-primary px-3 py-2 mb-3 rounded-pill font-weight-bold">
                Mon compte
            </span>

            <h1 class="font-weight-bold text-dark">
                Mon profil 👤
            </h1>

            <p class="text-muted">
                Consultez et modifiez les informations de votre compte.
            </p>

        </div>


        <!-- Profile Information -->
        <div class="card border-0 shadow-sm mb-4 rounded-lg">

            <div class="card-body p-4 p-lg-5">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <p class="text-uppercase font-weight-bold text-primary mb-1 small">
                            Compte
                        </p>

                        <h3 class="font-weight-bold mb-0 text-dark">
                            Profile Information
                        </h3>

                    </div>

                    <div class="d-flex align-items-center justify-content-center bg-light rounded-circle"
                         style="width: 65px; height: 65px;">

                        <span style="font-size: 30px;">
                            👤
                        </span>

                    </div>

                </div>


                <p class="text-muted mb-4">
                    Modifiez votre nom et votre adresse email.
                </p>


                <form method="post"
                      action="{{ route('profile.update') }}">

                    @csrf
                    @method('patch')


                    <!-- Name -->
                    <div class="mb-4">

                        <label for="name"
                               class="form-label font-weight-bold">

                            Nom

                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            class="form-control form-control-lg"
                            value="{{ old('name', $user->name) }}"
                            required
                            autofocus
                            autocomplete="name"
                        >

                        @if ($errors->get('name'))

                            <div class="text-danger small mt-2">

                                @foreach ($errors->get('name') as $message)

                                    <div>
                                        {{ $message }}
                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>


                    <!-- Email -->
                    <div class="mb-4">

                        <label for="email"
                               class="form-label font-weight-bold">

                            Email

                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            class="form-control form-control-lg"
                            value="{{ old('email', $user->email) }}"
                            required
                            autocomplete="username"
                        >

                        @if ($errors->get('email'))

                            <div class="text-danger small mt-2">

                                @foreach ($errors->get('email') as $message)

                                    <div>
                                        {{ $message }}
                                    </div>

                                @endforeach

                            </div>

                        @endif


                        {{-- Email verification --}}
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                            <div class="alert alert-warning mt-3">

                                <p class="mb-2">
                                    ⚠️ Votre adresse email n'est pas encore vérifiée.
                                </p>

                                <form id="send-verification"
                                      method="post"
                                      action="{{ route('verification.send') }}">

                                    @csrf

                                    <button type="submit"
                                            class="btn btn-outline-warning btn-sm shadow-sm rounded-pill font-weight-bold px-3">

                                        Renvoyer l'email de vérification

                                    </button>

                                </form>

                            </div>


                            @if (session('status') === 'verification-link-sent')

                                <div class="alert alert-success">

                                    ✓ Un nouveau lien de vérification a été envoyé.

                                </div>

                            @endif

                        @endif

                    </div>


                    <!-- Save -->
                    <div class="d-flex align-items-center">

                        <button type="submit"
                                class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold">

                            💾 Enregistrer

                        </button>


                        @if (session('status') === 'profile-updated')

                            <span class="text-success font-weight-bold ml-3">

                                ✓ Profil mis à jour

                            </span>

                        @endif

                    </div>

                </form>

            </div>

        </div>


        <!-- Update Password -->
        <div class="card border-0 shadow-sm mb-4 rounded-lg">

            <div class="card-body p-4 p-lg-5">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <p class="text-uppercase font-weight-bold text-primary mb-1 small">
                            Sécurité
                        </p>

                        <h3 class="font-weight-bold mb-0 text-dark">
                            Update Password
                        </h3>

                    </div>

                    <div class="d-flex align-items-center justify-content-center bg-light rounded-circle"
                         style="width: 65px; height: 65px;">

                        <span style="font-size: 30px;">
                            🔐
                        </span>

                    </div>

                </div>


                <p class="text-muted mb-4">
                    Modifiez votre mot de passe pour sécuriser votre compte.
                </p>


                <form method="post"
                      action="{{ route('password.update') }}">

                    @csrf
                    @method('put')


                    <!-- Current Password -->
                    <div class="mb-4">

                        <label for="update_password_current_password"
                               class="form-label font-weight-bold">

                            Current Password

                        </label>

                        <input
                            id="update_password_current_password"
                            name="current_password"
                            type="password"
                            class="form-control form-control-lg"
                            autocomplete="current-password"
                            placeholder="Votre mot de passe actuel"
                        >

                        @if ($errors->updatePassword->get('current_password'))

                            <div class="text-danger small mt-2">

                                @foreach ($errors->updatePassword->get('current_password') as $message)

                                    <div>
                                        {{ $message }}
                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>


                    <!-- New Password -->
                    <div class="mb-4">

                        <label for="update_password_password"
                               class="form-label font-weight-bold">

                            New Password

                        </label>

                        <input
                            id="update_password_password"
                            name="password"
                            type="password"
                            class="form-control form-control-lg"
                            autocomplete="new-password"
                            placeholder="Votre nouveau mot de passe"
                        >

                        @if ($errors->updatePassword->get('password'))

                            <div class="text-danger small mt-2">

                                @foreach ($errors->updatePassword->get('password') as $message)

                                    <div>
                                        {{ $message }}
                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>


                    <!-- Confirm Password -->
                    <div class="mb-4">

                        <label for="update_password_password_confirmation"
                               class="form-label font-weight-bold">

                            Confirm Password

                        </label>

                        <input
                            id="update_password_password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="form-control form-control-lg"
                            autocomplete="new-password"
                            placeholder="Confirmez votre nouveau mot de passe"
                        >

                        @if ($errors->updatePassword->get('password_confirmation'))

                            <div class="text-danger small mt-2">

                                @foreach ($errors->updatePassword->get('password_confirmation') as $message)

                                    <div>
                                        {{ $message }}
                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>


                    <!-- Save -->
                    <div class="d-flex align-items-center">

                        <button type="submit"
                                class="btn btn-primary shadow-sm px-4 rounded-pill font-weight-bold">

                            💾 Enregistrer

                        </button>


                        @if (session('status') === 'password-updated')

                            <span class="text-success font-weight-bold ml-3">

                                ✓ Mot de passe mis à jour

                            </span>

                        @endif

                    </div>

                </form>

            </div>

        </div>


        <!-- Delete Account -->
        <div class="card border-0 shadow-sm mb-4 rounded-lg">

            <div class="card-body p-4 p-lg-5">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <p class="text-uppercase font-weight-bold text-danger mb-1 small">
                            Zone sensible
                        </p>

                        <h3 class="font-weight-bold mb-0 text-dark">
                            Delete Account
                        </h3>

                    </div>

                    <div class="d-flex align-items-center justify-content-center bg-light rounded-circle"
                         style="width: 65px; height: 65px;">

                        <span style="font-size: 30px;">
                            🗑️
                        </span>

                    </div>

                </div>


                <p class="text-muted mb-4">
                    La suppression de votre compte est définitive.
                    Toutes vos données seront supprimées.
                </p>


                <button
                    type="button"
                    class="btn btn-outline-danger shadow-sm px-4 rounded-pill font-weight-bold"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteAccountModal">

                    🗑️ Supprimer mon compte

                </button>

            </div>

        </div>

    </main>


    <!-- Delete Account Modal -->
    <div class="modal fade"
         id="deleteAccountModal"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow">

                <div class="modal-header">

                    <h5 class="modal-title font-weight-bold">
                        Supprimer le compte ?
                    </h5>

                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>


                <form method="post"
                      action="{{ route('profile.destroy') }}">

                    @csrf
                    @method('delete')


                    <div class="modal-body">

                        <p class="text-muted">
                            Cette action est définitive.
                            Entrez votre mot de passe pour confirmer
                            la suppression de votre compte.
                        </p>


                        <label for="delete_password"
                               class="form-label font-weight-bold">

                            Mot de passe

                        </label>

                        <input
                            id="delete_password"
                            name="password"
                            type="password"
                            class="form-control"
                            placeholder="Votre mot de passe"
                        >


                        @if ($errors->userDeletion->get('password'))

                            <div class="text-danger small mt-2">

                                @foreach ($errors->userDeletion->get('password') as $message)

                                    <div>
                                        {{ $message }}
                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>


                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-secondary shadow-sm rounded-pill px-4 font-weight-bold"
                            data-bs-dismiss="modal">

                            Annuler

                        </button>


                        <button
                            type="submit"
                            class="btn btn-danger shadow-sm rounded-pill px-4 font-weight-bold">

                            Supprimer définitivement

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <!-- Footer -->
    <footer class="bg-white border-top py-4 mt-5">

        <div class="container text-center">

            <p class="text-muted mb-0 font-weight-bold">

                © {{ date('Y') }}
                {{ config('app.name', 'Bibliothèque') }}
                — Système de gestion

            </p>

        </div>

    </footer>


</body>

</html>