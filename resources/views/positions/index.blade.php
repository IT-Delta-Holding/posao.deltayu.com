@extends('layouts.app-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Otvorene pozicije</h2>
            </div>
            <div class="pull-right">
                @can('position-create')
                    <a class="btn btn-success" href="{{ route('positions.create') }}"> Kreirajte novu poziciju</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>r.br.</th>
            <th>Naziv pozicije</th>
            <th>Pravno lice</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($positions as $key => $position)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $position->title }}</td>
                <td>{{ $position->legalEntity->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('positions.show',$position->id) }}">Show</a>
                    @can('position-edit')
                        <a class="btn btn-primary" href="{{ route('positions.edit',$position->id) }}">Edit</a>
                    @endcan
                    @can('position-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['positions.destroy', $position->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>


    {!! $positions->render() !!}
@endsection
