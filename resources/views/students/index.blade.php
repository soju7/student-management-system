@extends('layouts.default')
@section('content')
<div class="row">
<div class="col-sm-12">

   

    <h1 class="display-3">Students</h1>
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif  
    <div>
    <a style="margin: 19px;" href="{{ route('student.create')}}" class="btn btn-primary">New student</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Age</td>
          <td>Gender</td>
          <td>Reporting Teacher</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->reporting_teacher}}</td>
            <td>
                <a href="{{ route('student.edit',$student->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('student.destroy', $student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection