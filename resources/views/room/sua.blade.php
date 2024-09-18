@extends('layout.student')

@section('content')
<div class="card my-5">
    <h4 class="card-header">Cập nhật </h4>
    <div class="card-body">
        <form action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="" class="form-label">name</label>
              <input type="text" class="form-control" name="name" value="{{$student->name}}">
               @error('name')
                 <p class="text-danger">{{$message}}</p>
             @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="1" {{$student->gender == 1 ? 'checked':''}} >
                    <label class="form-check-label" for="flexRadioDefault1" >
                      Nam
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"  value="0" {{$student->gender == 0 ? 'checked':''}} >
                    <label class="form-check-label" for="flexRadioDefault2">
                     Nữ
                    </label>
                  </div>
                @error('gender')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="form-label">phone</label>
                <input type="number" class="form-control" name="phone" value="{{$student->phone}}">
                @error('phone')
                 <p class="text-danger">{{$message}}</p>
             @enderror
              </div>
              <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" class="form-control" name="address" value="{{$student->address}}">
                @error('address')
                 <p class="text-danger">{{$message}}</p>
             @enderror
              </div>
              <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" class="form-control" name="image" value="">
                <img src="{{Storage::url($student->image)}}" alt="" width="100px">
 @error('image')
                 <p class="text-danger">{{$message}}</p>
             @enderror
              </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection