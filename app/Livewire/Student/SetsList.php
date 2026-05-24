<?php

namespace App\Livewire\Student;

use App\Models\Set;
use Livewire\Component;

class SetsList extends Component
{
    public function render()
    {
        return view('livewire.student.sets-list', [
            'sets' => Set::with('user')->latest()->get()
        ]);
    }
}