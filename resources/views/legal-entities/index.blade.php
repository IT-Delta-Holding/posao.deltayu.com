@extends('layouts.app-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Firme članice</h2>
            </div>
            <div class="pull-right">
                @can('legalentity-create')
                    <a class="btn btn-success" href="{{ route('legalentities.create') }}"> Kreiraj novu firmu članicu</a>
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
            <th>Naziv</th>
            <th>Detalji</th>
            <th>uri</th>
            <th width="280px">Akcija</th>
        </tr>
        @foreach ($legalEntities as $legalentity)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $legalentity->name }}</td>
                <td>{{ $legalentity->detail }}</td>
                <td>{{ $legalentity->uri }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('legalentities.show',$legalentity->id) }}">Show</a>
                    @can('legalentity-edit')
                        <a class="btn btn-primary" href="{{ route('legalentities.edit',$legalentity->id) }}">Edit</a>
                    @endcan
                    @can('legalentity-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['legalentities.destroy', $legalentity->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>


    {!! $legalEntities->render() !!}

@endsection
