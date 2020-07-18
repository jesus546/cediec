<?php

namespace App\Http\Livewire;

use App\mensaje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Counter extends Component
{

    public $nombre;
    public $mensaje;
   
    public function mount()
    {
       $this->nombre = " ";
       $this->mensaje = " ";

    }
    public function render()
    {
        
        return view('livewire.counter', [
            'nombres' => Auth::user()->nombres,
        ]);
    }

    public function enviarMensaje()
    {
        mensaje::create([
            "mensaje" => $this->mensaje
        ]);
        $this->emit('enviarMensajes');
    }
}
