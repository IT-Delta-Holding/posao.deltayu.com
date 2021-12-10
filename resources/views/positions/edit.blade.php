@extends('layouts.app-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Uredi poziciju: <b>{{ $position->title }}</b></h2>
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


    {!! Form::model($position, ['method' => 'PUT','route' => ['positions.update', $position->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Naziv pozicije:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Naziv pozicije','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis pozicije:</strong>
                {!! Form::text('description', null, array('placeholder' => 'Opis pozicije','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Odgovornosti pozicije:</strong>
                {!! Form::text('responsibilities', null, array('placeholder' => 'Odgovornosti pozicije','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kompetence pozicije:</strong>
                {!! Form::text('competences', null, array('placeholder' => 'Kompetence pozicije','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pravno lice:</strong>
                {{ Form::select('legal_entity_id', $legalEntity->pluck('name', 'id'), $legalEntity->pluck('name'), ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}


@endsection
