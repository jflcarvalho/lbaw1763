@extends('layouts.app')

@section('content')
<main class="container-fluid px-0">
        <div class="jumbotron jumbotron-fluid mb-0" id="jumbotron_signup">
            <div id="sign-up-jumbo" class="container text-dark d-flex flex-row" style="height: 100%;">
                <div class="p-2 mx-auto">
                    <h1 class="display-3 text-weight-light">Don't be left out!</h1>
                    <p class="lead">Join our ever-growing user base.</p>
                </div>
                <div class="p-2 mx-auto text-dark">
                    <div class="card">
                        <div class="card-body">
                          <form method="POST" action="{{ route('register') }}">
                               {{ csrf_field() }}
                               <div class="form-group">
                                    <label for="username">
                                        <small>Username</small>
                                    </label>
                                    <input name="name" type="text" class="form-control" id="username" placeholder="Your username here" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        <small>Email address</small>
                                    </label>
                                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Your email here" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                        <small>Password</small>
                                    </label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">
                                        <small>Confirm Password</small>
                                    </label>
                                    <input name="password_confirmation" type="password" class="form-control" id="confirm_password" placeholder="Password" required>
                                </div>
                                <div class="form-check">
                                    <input name="accept" type="checkbox" class="form-check-input" id="check" required>
                                    <label class="form-check-label" for="check">I accept the terms and conditions.</label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 mx-auto">
                                  Sign up for SegFault
                                </button>
                          </form>

                            <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
                            <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
