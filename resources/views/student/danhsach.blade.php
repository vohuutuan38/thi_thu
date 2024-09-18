@extends('layout.student')

@section('content')
<div class="card my-5">
  <livewire:count>
    <h4 class="card-header">Danh sách</h4>
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
                <th scope="col">name</th>
                <th scope="col">gender</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">image</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $item)
                    
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$item->name}}</td>
                  <td>{{$item->gender == 1 ? 'nam' :'nữ'}}</td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->address}}</td>
                  <td><img src="{{Storage::url($item->image)}}" alt="" width="100px"></td>
                  <td>
                    <a href="{{route('student.edit',$item->id)}}" class="btn btn-warning">Sửa</a>
                    <form action="{{route('student.destroy',$item->id)}}" method="post" onsubmit="return confirm('bạn có muốn xóa không')">
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