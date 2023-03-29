@extends('tickets.layout')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Ticket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tickets.index') }}" enctype="multipart/form-data">
                    Torna</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('tickets.update',$ticket->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titulo Ticket:</strong>
                    <input type="text" name="titulo" value="{{ $ticket->titulo }}" class="form-control"
                           placeholder="titulo ticket">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion ticket:</strong>
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripcion ticket"
                           value="{{ $ticket->descripcion }}">
                    @error('descripcion')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Persona que lo crea:</strong>
                    <input type="text" name="nombre_persona" value="{{ $ticket->nombre_persona }}" class="form-control"
                           placeholder="Persona">
                    @error('person')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Actualitzar</button>
        </div>
    </form>
</div>
@endsection
