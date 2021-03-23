<?php

namespace App\Repositories;

use App\Student;
use App\Repositories\Interfaces\StudentInterface;

class StudentRepository implements StudentInterface
{
    public function all()
    {
        return Student::get();
    }

    public function create(array $data)
    {
        $student = new Student($data);
        return $student->save();
    }

    public function update(array $data,$id)
    {
        $student=$this->find($id);
        $student->name =  $data['name'];
        $student->age = $data['age'];
        $student->gender = $data['gender'];
        $student->reporting_teacher = $data['reporting_teacher'];
        return $student->save();
    }

    public function find($id)
    {
        return Student::find($id);
    }

    public function delete($id)
    {
        $student=$this->find($id);
        return $student->delete();
    }

    public function count()
    {
        return Student::count();
    }

    public function getTeachers()
    {
        return ['Katie','Max','Alex'];
    }

    public function getTerms()
    {
        return ['one','two'];
    }
}