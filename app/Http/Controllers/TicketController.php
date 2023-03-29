<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Symfony\Component\String\AbstractUnicodeString;

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
            'foto'=> 'required',
            //'g-recaptcha-response' => 'required|captcha',
        ]);

        Ticket::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'nombre_persona' => $request->nombre_persona,
            'foto' =>$request->file('foto'),
        ]);

        return redirect()->route('tickets.index')->with('success','El Ticket se ha creado satisfactoriamente.');


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

        return redirect()->route('tickets.index')->with('success','El Ticket se ha modificado satisfactoriamente');
    }

    public function destroy(Ticket $ticket){
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success','El Ticket se ha borrado satisfactoriamente');
    }

    protected function showImage($filename)
    {
        $exists = Storage::disk('public')->exists($filename);

        if($exists)
        {
            $content = Storage::get('public/'.$filename);
            $mime = Storage::mimeType('public/'.$filename);

            $response = Response::make($content, 200);
            $response->header("Content-Type", $mime);
            return $response;
        } else {
            return $this->getDefaultImage(); // abort('404');
        }
    }

}
