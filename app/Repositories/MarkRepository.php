<?php

namespace App\Repositories;

use App\Mark;
use App\Repositories\Interfaces\MarkInterface;

class MarkRepository implements MarkInterface
{
    public function all()
    {
        return Mark::get();
    }

    public function create(array $data)
    {
        $mark = new Mark($data);
        return $mark->save();
    }

    public function update(array $data,$id)
    {
        $mark=$this->find($id);
        $mark->student_id =  $data['student_id'];
        $mark->maths = $data['maths'];
        $mark->science = $data['science'];
        $mark->history = $data['history'];
        return $mark->save();
    }

    public function find($id)
    {
        return Mark::find($id);
    }

    public function delete($id)
    {
        $mark=$this->find($id);
        return $mark->delete();
    }
}