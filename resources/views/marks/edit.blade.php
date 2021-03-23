@extends('layouts.default')
@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Update</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      <br />
    @endif
    
      <form method="post" action="{{ route('mark.update',$mark->id) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
          <label for="student_name">Student Name:</label>
            <select class="form-control" id="student_name" name="student_id" required>
              <option value="">select a student</option>
              @foreach($students as $student)
              <option value="{{$student->id}}" {{ old('student_id', $mark->student->id) == $student->id ? 'selected' : '' }}>{{$student->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">    
              <label for="term">Term:</label>
              <select class="form-control" id="term" name="term" required>
              <option value="">select a term</option>
              @foreach($terms as $term)
              <option value="{{$term}}" {{ old('term', $mark->term) == $term ? 'selected' : '' }}>{{ucfirst($term)}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="maths">Maths</label>
              <input type="number" class="form-control" name="maths" value="{{ old('maths') ? old('maths') : $mark->maths }}" required min="0" max="100" placeholder="please enter maths mark"/>
          </div>
          <div class="form-group">
              <label for="science">Science</label>
              <input type="number" class="form-control" name="science" required value="{{ old('science') ? old('science') : $mark->science }}"" min="0" max="100" placeholder="please enter science mark"/>
          </div>
          <div class="form-group">
              <label for="history">History</label> 
              <input type="string" class="form-control" name="history" required value="{{ old('history') ? old('history') : $mark->history }}" min="0" max="100" placeholder="please enter history mark"/>
          </div>           
          <button type="submit" class="btn btn-primary">Update mark</button>
      </form>
  </div>
</div>
</div>
@endsection