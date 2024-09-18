@extends('layout.student')

@section('content')
<div class="card my-5">
    <h4 class="card-header">Thêm mới room</h4>
    <div class="card-body">
      
        <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3">
              <label for="" class="form-label">Room</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($listRoom as $item)
                <option value="{{$item->id}}">{{$item->name_room}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">name</label>
              <input type="text" class="form-control" name="name" value="">
             @error('name')
                 <p class="text-danger">{{$message}}</p>
             @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="1" >
                    <label class="form-check-label" for="flexRadioDefault1" >
                      Nam
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"  value="0"  >
                    <label class="form-check-label" for="flexRadioDefault2">
                     Nữ
                    </label>
                    @error('gender')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                  </div>
               
              </div>
              <div class="mb-3">
                <label for="" class="form-label">phone</label>
                <input type="number" class="form-control" name="phone" value="">
                @error('phone')
                 <p class="text-danger">{{$message}}</p>
             @enderror
              </div>
              <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" class="form-control" name="address" value="">
                @error('address')
                 <p class="text-danger">{{$message}}</p>
             @enderror
              </div>
              <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" class="form-control" name="image" value="">
                @error('image')
                 <p class="text-danger">{{$message}}</p>
             @enderror
              </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>


    </div>
</div>
@endsection