@extends('layouts.app-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detalji pozicije: <b>{{ $position->title }}</b></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('positions.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Naziv pozicije:</strong>
                {{ $position->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis pozicije:</strong>
                {{ $position->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Odgovornosti:</strong>
                {{ $position->responsibilities }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kompetence:</strong>
                {{ $position->competences }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pravno lice:</strong>
                {{ $legalEntity }}
            </div>
        </div>
    </div>
@endsection
