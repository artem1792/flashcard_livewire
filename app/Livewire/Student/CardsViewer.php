<?php

namespace App\Livewire\Student;

use App\Models\Set;
use Livewire\Component;

class CardsViewer extends Component
{
    public Set $set;
    public int $currentIndex = 0;
    public bool $isFlipped = false;

    public function mount(int $setId)
    {
        $this->set = Set::with('cards')->findOrFail($setId);
    }

    public function next()
    {
        $this->isFlipped = false;
        if ($this->currentIndex < $this->set->cards->count() - 1) {
            $this->currentIndex++;
        }
    }

    public function prev()
    {
        $this->isFlipped = false;
        if ($this->currentIndex > 0) {
            $this->currentIndex--;
        }
    }

    public function toggleFlip()
    {
        $this->isFlipped = !$this->isFlipped;
    }

    public function render()
    {
        return view('livewire.student.cards-viewer');
    }
}