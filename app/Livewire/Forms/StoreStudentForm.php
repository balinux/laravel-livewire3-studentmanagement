<?php

namespace App\Livewire\Forms;

use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Form;

class StoreStudentForm extends Form
{
    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|image')]
    public $image;

    #[Rule('required')]
    public $section_id;
    
    function store($class_id) {
        $student = Student::create(
            $this->all() + ['class_id' => $class_id]
        );

        $student->addMedia($this->image)->toMediaCollection();
    }
}
