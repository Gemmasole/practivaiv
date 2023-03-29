@extends('tickets.layout')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Practica IV</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('tickets.create') }}"> Crear Ticket</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titulo Ticket</th>
            <th>Nombre Persona</th>
            <th>Prioridad</th>
            <th>Creado</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->titulo }}</td>
                <td>{{ $ticket->nombre_persona }}</td>
                <td>{{ $ticket->prioridad }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td>
                    <form action="{{ route('tickets.destroy',$ticket->id) }}" method="Post">
                        <a class="btn btn-info" href="{{route('tickets.show', $ticket->id) }}">Mostra</a>
                        <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edita</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $tickets->links() !!}
</div>
@endsection
