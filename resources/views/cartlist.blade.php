@extends('master')

@section('content')
<div class="container-fluid mt-5">
    @foreach($products as $product)
<div class="row cus_list ml-4">
    <div class="col-sm-4 ">
        <a href="details/{{$product->id}}">
        <img class="search-img " src="{{$product->gallery}}" alt="Los Angeles"></a>

    </div>

    <div class="col-sm-4 ">
        <h6>{{$product->name}}</h6>
        <h6 class="text-danger">{{$product->price}}đ</h6>
       <p>{{$product->description}}</p>
    </div>

    <div class="col-sm-4 "><a href="/deletelist/{{$product->id}}"><button class="cus-btn">Xóa</button> </a></div>
 
        
</div>

</div>

    @endforeach

   </div>
   <br />
  <a class="btn btn-primary ml-5"href="/ordernow">Đặt hàng ngay</a>
</div>
    @endsection




  