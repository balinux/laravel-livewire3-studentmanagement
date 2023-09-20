<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.student.index',[
            'students' => Student::all()
        ]);
    }
}
