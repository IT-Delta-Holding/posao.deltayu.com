@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.register') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/logo-v2.png') !!}" alt="" width="" height="">

        <h1 class="h3 mb-3 fw-normal">Registracija</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
            <label for="floatingName">Ime i prezime</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="Firma/sektor" required="required" autofocus>
            <label for="floatingCompany">Firma/sektor</label>
            @if ($errors->has('company'))
                <span class="text-danger text-left">{{ $errors->first('company') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email</label>
        @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>


        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Korisničko ime</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Lozinka</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Ponovi lozinku</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registruj se</button>

        @include('auth.partials.copy')
    </form>
@endsection
