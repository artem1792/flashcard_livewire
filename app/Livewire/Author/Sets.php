<?php

namespace App\Livewire\Author;

use App\Models\Set;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Sets extends Component
{
    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|string')]
    public string $description = '';

    public function save()
    {
        $this->validate();

        Set::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->reset(['title', 'description']);
    }

    public function render()
    {
        return view('livewire.author.sets', [
            'sets' => Set::where('user_id', Auth::id())->latest()->get()
        ]);
    }
}