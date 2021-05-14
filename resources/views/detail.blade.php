@extends('master')

@section('content')
<div class="container-fluid cus_product ">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{$products['gallery']}}" alt="Products">
        </div>
        <div class="col-sm-6">
            <a class="btn btn-outline-info"href="/home">Trở về</a>
            <h4>{{$products['name']}}</h4>
            <h6 class="text-danger">Giá: {{$products['price']."00.000đ"}}</h6>
            <h6><span style="color:red">Chi tiết:</span>  {{$products['description']}}</h6>
            <br/><br/>
         <form action="/addcart" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{$products['id']}}">
            <button class="btn btn-primary">Thêm vào giỏ hàng</button>
        </form>
            <br/><br/>
            <button class="btn btn-success">Mua ngay</button>
        </div>
    </div>
</div>
 @endsection 