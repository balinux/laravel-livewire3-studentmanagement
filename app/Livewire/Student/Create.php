<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|image')]
    public $image;

    #[Rule('required')]
    public $class_id;

    #[Rule('required')]
    public $section_id;

    public $sections = [];

    public function render()
    {
        return view('livewire.student.create',[
            // display all classes
            'classes' => Classes::all()
        ]);
    }

    public function updatedClassId($value){
        $this->sections = Section::where('class_id', $value)->get();
    }

    public function save()  {
        $this->validate();
        
        $student = Student::create(
            $this->only(['name', 'email', 'class_id', 'section_id'])
        );

        $student->addMedia($this->image)->toMediaCollection();

        return redirect(route('students.index'))->with('status','Student has been created');
    }
}
