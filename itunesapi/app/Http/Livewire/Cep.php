<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Cep extends Component
{
    public $pesquisa = '';
    public $logradouro;
    public $bairro;
    public $cidade;
    public $estado;


    public function buscaCep()
    {
        $response = Http::get('https://viacep.com.br/ws/'. $this->pesquisa .'/json/');

        $dadosApi = $response->json();

        if ($dadosApi == null) {
            {
               // dd('vazio', $dadosApi);
                session()->flash('message', 'Cep não encontrado.');
            }
            
        } else {
              //  dd('tem dados',$dadosApi);
            $this->logradouro = isset($dadosApi['logradouro']) ? $dadosApi['logradouro'] : '';
            $this->bairro = isset($dadosApi['bairro']) ? $dadosApi['bairro'] :'';
            $this->cidade = isset($dadosApi['localidade']) ? $dadosApi['localidade'] :'';
            $this->estado = isset($dadosApi['uf']) ? $dadosApi['uf'] : '';

            if ($this->logradouro == '') {
                session()->flash('message', 'Cep não encontrado.');       
            }
        }
    }

    public function render()
    {
        return view('livewire.cep');
    }

   
}
