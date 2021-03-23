@extends('layouts.default')
@section('content')
<div class="row">
<div class="col-sm-12">

   

    <h1 class="display-3">Students Mark</h1>
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif  
    <div>
    <a style="margin: 19px;" href="{{ route('mark.create')}}" class="btn btn-primary">New mark</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Science</td>
          <td>Maths</td>
          <td>History</td>
          <td>Term</td>
          <td>Total Marks</td>
          <td>Created On</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($marks as $mark)
        <tr>
            <td>{{$mark->id}}</td>
            <td>{{$mark->student->name}}</td>
            <td>{{$mark->maths}}</td>
            <td>{{$mark->science}}</td>
            <td>{{$mark->history}}</td>
            <td>{{$mark->term}}</td>
            <td>{{$mark->total_marks}}</td>
            <td>{{ \Carbon\Carbon::parse($mark->created_at)->isoFormat('MMM Do YYYY h:mm a')}}</td>
            <td>
                <a href="{{ route('mark.edit',$mark->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('mark.destroy', $mark->id)}}" method="post">
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