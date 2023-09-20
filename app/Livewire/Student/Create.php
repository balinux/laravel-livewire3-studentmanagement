<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $image, $class_id, $section_id;

    public function render()
    {
        return view('livewire.student.create',[
            // display all classes
            'classes' => Classes::all()
        ]);
    }

    public function save()  {
        Student::create(
            $this->only(['name', 'email', 'image', 'class_id', 'section_id'])
        );

        return redirect('students.index')->with('status','Student has been created');
    }
}
