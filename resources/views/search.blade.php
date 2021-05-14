@extends('master')

@section('content')
<div class="contaniner">
    <div class="row">
        <h6>Kết quả</h6>
        <div class="col-sm-4"> <a href="#">Lọc</a></div>
        <div class="col-sm-4 ">
            @foreach($products as $product)
            {{-- Set picture center "mx-auto d-block" --}}
            <h3>{{$product['name']}}</h3>
          <a href="details/{{$product['id']}}">
            <img class="search-img " src="{{$product['gallery']}}" alt="Los Angeles">
          </a>
          <h6 class="text-white bg-search">{{$product['description']}}</h6>
          @endforeach
        </div>
     
    </div>
</div>
    @endsection