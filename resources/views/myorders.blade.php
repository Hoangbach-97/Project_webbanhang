@extends('master')

@section('content')
<div class="container-fluid mt-5">
    <h5>Đơn hàng của tôi</h5>
    @foreach($orders as $product)
<div class="row cus_list ml-4">
    <div class="col-sm-4 ">
        <a href="details/{{$product->id}}">
        <img class="search-img " src="{{$product->gallery}}" alt="Los Angeles"></a>
    </div>
    <div class="col-sm-4 ">
        <h6 class="text-success">Tên sản phẩm: {{$product->name}}</h6>
        <h6>Trạng thái vận chuyển: {{$product->status}}</h6>
        <h6>Địa chỉ :{{$product->address}}</h6>
        <h6>Trạng thái thanh toán: {{$product->payment_status}}</h6>
        <h6>Phương thức thanh toán: {{$product->payment_method}}</h6>
    </div>
</div>
</div>
    @endforeach
   </div>
   <br />
</div>
    @endsection




  