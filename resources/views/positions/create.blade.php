@extends('layouts.app-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Nova pozicija</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('positions.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'positions.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Naziv pozicije:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Naziv pozicije','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Opis pozicije:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Opis pozicije','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Odgovornosti:</strong>
                {!! Form::textarea('responsibilities', null, array('placeholder' => 'Odgovornosti','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Kompetence:</strong>
                {!! Form::textarea('competences', null, array('placeholder' => 'Kompetence','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Pravno lice:</strong>
                {{ Form::select('legal_entity_id', $legalEntities->pluck('name', 'id'), $legalEntities->pluck('name'), ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
