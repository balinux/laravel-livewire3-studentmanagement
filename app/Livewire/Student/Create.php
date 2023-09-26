<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\StoreStudentForm;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public StoreStudentForm $form;
   

    #[Rule('required')]
    public $class_id;


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

        $this->form->store(class_id: $this->class_id);
        

        return redirect(route('students.index'))->with('status','Student has been created');
    }
}
