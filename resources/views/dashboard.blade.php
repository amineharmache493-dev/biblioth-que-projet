<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bibliothèque</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm py-3">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand font-weight-bold text-primary" style="font-size: 1.5rem;">
                📚 Bibliothèque
            </a>

            <!-- ml-auto katjib had l'partie l limn f Bootstrap 4 -->
            <div class="d-flex align-items-center ml-auto">
                <span class="text-muted mr-4">
                    Bonjour, <strong class="text-dark">{{ Auth::user()->name }}</strong>
                </span>

                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm mr-2 shadow-sm px-3 rounded-pill font-weight-bold">
                    Mon profil
                </a>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm shadow-sm px-3 rounded-pill font-weight-bold">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="container py-5">

        <!-- Welcome Area (B gradient-11 li 3ndk f style.css) -->
        <div class="card border-0 shadow-sm mb-5 gradient-11 rounded-lg">
            <div class="card-body p-4">
                
                <h1 class="font-weight-bold text-white mb-2 display-4" style="font-size: 2.5rem;">
                    Bienvenue, {{ Auth::user()->name }} 👋
                </h1>
                
                <p class="text-white-50 lead mb-0">
                    Gérez facilement les auteurs et les livres de votre bibliothèque.
                </p>
            </div>
        </div>

        <!-- Cards -->
        <div class="row mb-5">

            <!-- Auteurs -->
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm h-100 rounded-lg">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <p class="text-uppercase font-weight-bold text-primary mb-1 small">
                                    Gestion
                                </p>
                                <h3 class="font-weight-bold mb-0 text-dark">
                                    Auteurs
                                </h3>
                            </div>
                            <div class="d-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 65px; height: 65px;">
                                <span style="font-size: 30px;">👤</span>
                            </div>
                        </div>
                        
                        <p class="text-muted mb-4">
                            Consultez, ajoutez et gérez tous les auteurs enregistrés.
                        </p>
                        
                        <a href="{{ route('auteurs.index') }}" class="btn btn-primary btn-block shadow-sm rounded-pill font-weight-bold py-2">
                            Gérer les auteurs →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Livres -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 rounded-lg">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <p class="text-uppercase font-weight-bold text-success mb-1 small">
                                    Catalogue
                                </p>
                                <h3 class="font-weight-bold mb-0 text-dark">
                                    Livres
                                </h3>
                            </div>
                            <div class="d-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 65px; height: 65px;">
                                <span style="font-size: 30px;">📚</span>
                            </div>
                        </div>
                        
                        <p class="text-muted mb-4">
                            Explorez l'inventaire, mettez à jour ou ajoutez de nouveaux livres.
                        </p>
                        
                        <a href="{{ route('livres.index') }}" class="btn btn-success btn-block shadow-sm rounded-pill font-weight-bold py-2">
                            Gérer les livres →
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-4 p-md-5 text-center">
                
                <h4 class="font-weight-bold mb-4 text-dark">
                    ⚡ Actions rapides
                </h4>
                
                <div class="d-flex justify-content-center flex-wrap">
                    <a href="{{ route('auteurs.create') }}" class="btn btn-primary shadow-sm mx-2 my-2 px-4 py-2 rounded-pill font-weight-bold">
                        + Ajouter un auteur
                    </a>
                    <a href="{{ route('livres.create') }}" class="btn btn-outline-primary shadow-sm mx-2 my-2 px-4 py-2 rounded-pill font-weight-bold">
                        + Ajouter un livre
                    </a>
                </div>
                
            </div>
        </div>

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