@extends('layouts.app-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detalji pravnog lica: <b>{{ $legalEntity->name }}</b></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('legal-entities.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Naziv pravnog lica:</strong>
                {{ $legalEntity->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalji pravnog lica:</strong>
                {{ $legalEntity->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>URI:</strong>
                {{ $legalEntity->uri }}
            </div>
        </div>
@endsection
