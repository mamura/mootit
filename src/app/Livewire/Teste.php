<?php

namespace App\Livewire;

use Livewire\Component;

class Teste extends Component
{
    public string $nome = '';

    public function render()
    {
        return view('livewire.teste');
    }
}
