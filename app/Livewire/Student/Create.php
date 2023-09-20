<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|image')]
    public $image;

    #[Rule('required|exists:classes')]
    public $class_id;

    #[Rule('required|exists:classes')]
    public $section_id;

    public function render()
    {
        return view('livewire.student.create',[
            // display all classes
            'classes' => Classes::all()
        ]);
    }

    public function save()  {
        $this->validate();
        
        Student::create(
            $this->only(['name', 'email', 'image', 'class_id', 'section_id'])
        );

        return redirect('students.index')->with('status','Student has been created');
    }
}
