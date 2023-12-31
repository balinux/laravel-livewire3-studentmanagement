<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Student;
use Livewire\Attributes\Rule;

class UpdateStudentForm extends Form
{
    public Student $student;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|image')]
    public $image;

    #[Rule('required')]
    public $section_id;

    public function setStudent(Student $student)
    {
        $this->student = $student;

        $this->name = $student->name;
        $this->section_id = $student->section_id;
        $this->email = $student->email;
    }

    public function update($class_id)
    {
        // $this->validate();

        $this->student->update([
            'name' => $this->name,
            'class_id' => $class_id,
            'section_id' => $this->section_id,
            'email' => $this->email,
        ]);

        
        if ($this->image) {
            $this->student
                ->addMedia($this->image)
                ->toMediaCollection();
        }
    }
}