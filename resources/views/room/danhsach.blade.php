@extends('layout.student')

@section('content')
<div class="card my-5">
    <h4 class="card-header">Room</h4>
    <div class="card-body">
        <div class="d-flex justify-content-between">
           <a href="{{route('student.create')}}"><button class="btn btn-success">Thêm </button></a> 
            <form action="" method="GET">
              
                <div class="input-group">
                    <input type="text" class="form-control" name="timkiem" placeholder="Tìm kiếm">
                    <button class="btn btn-secondary" type="submit" >Tìm kiếm</button>
                </div>
                
            </form>
        </div>
     
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name_room</th>
                <th scope="col">hinh_anh</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $key => $item)
                    
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$item->name_room}}</td>
                  <td><img src="{{Storage::url($item->hinh_anh)}}" alt="" width="100px"></td>
                  <td>
                    <a href="{{route('room.edit',$item->id)}}" class="btn btn-warning">Sửa</a>
                    <form action="{{route('room.destroy',$item->id)}}" method="post" onsubmit="return confirm('bạn có muốn xóa không')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                  </td>
                </tr>

                @endforeach
             
            </tbody>
          </table>
       

    </div>
</div>
@endsection