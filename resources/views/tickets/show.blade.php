<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practica 4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titulo Ticket</th>
            <th>Nombre Persona</th>
            <th>Creado</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->nombre_persona }}</td>
                <td>{{ $ticket->prioridad }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td>
                    <form action="{{ route('tickets.destroy',$ticket->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $tickets->links() !!}
</div>
</body>
</html>
