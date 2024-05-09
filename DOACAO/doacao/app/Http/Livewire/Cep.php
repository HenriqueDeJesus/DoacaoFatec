<?php

namespace App\Livewire;

use Livewire\Component;
use Iluminate\Support\Facades\Http;

class Cep extends Component
{
    public $cep;
    public $logradouro;
    public $bairro;
    public $cidade;
    public $estado;

    public function buscaCep($cep)
    {
        $response = Http::get('https://viacep.com.br/ws/'. $cep .'/json/');

        $dadosApi = $response->json();
        
        $this->logradouro = $dadosApi['logradouro'];
        $this->bairro = $dadosApi['bairro'];
        $this->cidade = $dadosApi['localidade'];
        $this->estado = $dadosApi['uf'];

    }

    public function render()
    {
        return view('livewire.cep');
    }
}
