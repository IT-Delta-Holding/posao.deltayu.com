@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Dashboard</h1>
            <p class="lead">Only authenticated users can access this section.</p>
        @endauth

        @guest
            <h1>Delta Holding</h1>
                <div class="container mt-5">

                    <!-- Success message -->
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <h3>Prijavi se odmah!</h3>
                    <p>Popuni formu za prijavu i mi ćemo ti se javiti ubrzo!</p>



                    <form action="api/application/insert" method="POST">

                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf
                        <div id="app">
                            <front-page></front-page>
                        </div>

                        <div class="form-group">
                            <label>Ime i prezime</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label>Dodaj svoj CV</label>
                            <input class="form-control" type="file" id="cv" name="cv" accept=".doc,.docx,.pdf">
                        </div>

                        <div class="form-group custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="" id="saglasnost_radio">
                            <label class="custom-control-label" for="saglasnost_radio">
                                Prihvatam uslove <a href="#">Konkursa</a>
                            </label>
                        </div>

                        <input type="submit" name="send" value="Pošalji" class="btn btn-dark btn-block">
                    </form>
                </div>
        @endguest
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
@endsection
