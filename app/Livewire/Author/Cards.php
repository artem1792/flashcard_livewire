<?php

namespace App\Livewire\Author;

use App\Models\Set;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Cards extends Component
{
    public Set $set;

    #[Validate('required|string|max:255')]
    public string $front_text = '';

    #[Validate('required|string|max:255')]
    public string $back_text = '';

    public function mount(int $setId)
    {
        $this->set = Set::findOrFail($setId);
    }

    public function add()
    {
        $this->validate();

        $this->set->cards()->create([
            'front_text' => $this->front_text,
            'back_text' => $this->back_text,
        ]);

        $this->reset(['front_text', 'back_text']);
    }

    public function render()
    {
        return view('livewire.author.cards', [
            'cards' => $this->set->cards()->latest()->get()
        ]);
    }
}