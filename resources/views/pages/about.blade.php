<!DOCTYPE html>
<html>

<head>
    <title>SegFault</title>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="363600186338-42qbml3vfjt0332752ar6gu585eeqpq3.apps.googleusercontent.com">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('font/fontawesome/css/fa-svg-with-js.css') }}}" />
    <script defer src="{{ asset('font/fontawesome/js/fontawesome-all.js') }}}"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap v4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <!-- Styling  -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap-social.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/styling-bootstrap.css') }}" />

</head>

<body>
<header class="sticky-top">
    <div id="navbar" class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <!-- Logo -->
            <a class="navbar-brand py-0 order-0 mr-0 mr-sm-3"href="index.html">
                <img src="{{ asset('img/logo.png') }}" width="40" height="40" class="d-inline-block align-center" alt="">
                <span>SegFault</span>
            </a>

            <!-- Collapse Menu -->
            <button class="navbar-toggler mr-auto-sm order-2 ml-sm-3" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-sm-1 ml-3" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.html">Questions
                        <span class="sr-only">(current)</span>
                    </a>
                    <a class="nav-item nav-link" href="tags.html">Categories</a>
                </div>

                <!-- Search Bar -->
                <form class="form-inline">
                    <input class="form-control mx-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <div class="ml-auto-sm px-0 order-1 order-sm-2 d-flex justify-content-between justify-content-sm-end">
                <!-- Sign In/Sign Up -->
                <div class="dropdown mx-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Sign In
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form class="px-4 py-3" action="index(logged).html">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-signin">Sign in</button>
                            <a class="btn btn-social btn-github" href="#">
                                <i class="fab fa-github"></i>
                                <div>Sign in with Github</div>
                            </a>
                            <div class="mx-auto mt-1 d-flex">
                                <div class="g-signin2" data-onsuccess="onSignIn" data-width="200" data-height="34" data-longtitle="true">button</div>
                            </div>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="sign-up.html">New around here? Sign up</a>
                    </div>
                </div>

                <!-- Sign up -->
                <div class="dropdown mx-2">
                    <a class="btn btn-primary" href="sign-up.html" role="button">Sign Up</a>
                </div>
            </div>
        </nav>
    </div>
</header>

<main class="container-fluid px-0">
    <div class="jumbotron jumbotron-fluid mb-0" id="jumbotron_about">
        <div class="container text-dark d-flex flex-column" style="height: 100%;">
            <div class="p-2 mb-5">
                <h1 class="display-4">Welcome to Seg
                    <i>Fault</i>
                </h1>
                <p class="lead">A community for
                    <i>learning</i>. A community for
                    <i>teaching</i>.</p>
            </div>

            <div class="p-2 mb-5 align-self-stretch">
                <blockquote class="blockquote text-right">
                    <p class="mb-0">Tell me and I forget. Teach me and I remember. Involve me and I learn.</p>
                    <footer class="blockquote-footer">Benjamin Franklin</footer>
                </blockquote>
            </div>

            <h2>The Team</h2>
        </div>

        <div class="d-flex text-center justify-content-center">
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/profile_andre.jpg') }}" alt="Card image cap">
                <div class="team-sentences card-body">
                    <h4 class="card-title">André Cruz</h4>
                    <p class="card-text">Pls let us use node.js, we won't use ORMs :^)</p>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/profile_joao.jpg') }}" alt="Card image cap">
                <div class="team-sentences card-body">
                    <h4 class="card-title">João Carvalho</h4>
                    <p class="card-text">Come to ENEI!</p>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/profile_edgar.jpg') }}" alt="Card image cap">
                <div class="team-sentences card-body">
                    <h4 class="card-title">Edgar Carneiro</h4>
                    <p class="card-text">I've read the bible.</p>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/profile_daniel.png') }}" alt="Card image cap">
                <div class="team-sentences card-body">
                    <h4 class="card-title">Daniel Marques</h4>
                    <p class="card-text">I play too much assassins creed...</p>
                </div>
            </div>
        </div>

    </div>

</main>

<footer class="bg-light">
    <div class="container align-items-center row py-2 mx-auto">
        <div class="col text-left">
            © 2018 SegFault
        </div>
        <div class="col text-center">
            <a class="" href="index.html">
                <img src="{{ asset('img/logo.png') }}" width="50" height="50" class="d-inline-block align-center" alt="Segfault Logo">
            </a>
        </div>
        <div class="col text-right">
            <a class="nav-link" href="about.html">
                About us
            </a>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

</body>

</html>