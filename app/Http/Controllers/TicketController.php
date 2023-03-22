<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::orderBy('id', 'desc')->paginate(5);
        return view('tickets.index', compact('tickets'));
    }
    public function create(){
        return view('tickets.create');
    }

    public function store(Request $request){
        $request->validate([
            'titulo'=> 'required',
            'descripcion'=> 'required',
            'nombre_persona'=> 'required',
        ]);

        Ticket::create($request->post());

        return redirect()->route('tickets.index')->with('success','Company has been created successfully.');
    }

    public function show(Ticket $ticket){
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket){
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket){
        $request->validate([
            'titulo'=> 'required',
            'descripcion'=> 'required',
            'nombre_persona'=> 'required',
        ]);

        $ticket->fill($request->post())->save();

        return redirect()->route('tickets.index')->with('success','Company Has Been updated successfully');
    }

    public function destroy(Ticket $ticket){
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success','Company Has Been updated successfully');
    }
}
