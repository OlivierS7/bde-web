<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <title>BDE St-Nazaire</title>
    @yield('link')
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Barre de navigation</h3>
            </div>
            <h4>Site du BDE de Saint-Nazaire</h4>
            <ul class="list-unstyled components">
                <li>
                    <a href="home">Page d'accueil</a>
                </li>
                <li>
                    <a href="boutique">Boutique</a>
                </li>
                <li>
                    <a href="events">Activités / Évènements</a>
                </li>
                <li>
                    <a href="espace-membre">Espace Membre</a>
                </li>
                <li>
                    <a href="contact">Contact</a>
                </li>
                <li>
                    <a href="mentions-legales">Mentions Légales</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="sticky-top">
        <div class="wrapper2">
            <nav id="top-navbar">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="boutique">Boutique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events">Activités / Évènements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="espace-membre">Espace Membre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mentions-legales">Mentions Légales</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="sticky-top">
        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Barre de navigation</span>
            </button>
        </div>
    </div>

    <div class="sticky-top">
        <button type="button" class="btn btn-info btn-right-connexion" onclick="window.location.href = 'connection';">
            <i class="fas fa-align-right"></i>
                <span>Connexion / Inscription</span>
        </button>

    </div>

    <div id="main">
        @yield('content')
    </div>

    <footer class="footer-bottom fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <a href="contact">Contact</a>
                    <a href="mentions-legales">Mentions Légales</a>
                    <p>© 2019 | CESI BDE Saint-Nazaire</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>
    <script src="{{ asset('js/navbar_script.js') }}"></script>
</body>

</html>