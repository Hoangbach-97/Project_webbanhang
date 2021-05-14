@extends('master')

@section('content')
<div class="container-fluid cus_product ">
    <div class="row">
        <div class="col-sm-12">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner ">
            @foreach($products as $product)
            <div class="carousel-item {{$product['id']==1?'active':''}} ">
                {{-- Set picture center "mx-auto d-block" --}}
              <a href="details/{{$product['id']}}">
                <img class="slider-img mx-auto d-block " src="{{$product['gallery']}}" alt="Los Angeles">
                <div class="carousel-caption text-white text-slider">
                    <h3>{{$product['name']}}</h3>
                    <p>{{$product['description']}}</p>
                </div>
              </a>
              </div>
              @endforeach
            </div>
        <a class="carousel-control-prev"  href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span style="background-color:rgba(0, 255, 115, 0.651)" class="carousel-control-prev-icon "  aria-hidden="true"></span>
          <span class="sr-only " >Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span style="background-color:rgba(0, 255, 98, 0.637)" class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
     </div>
     <div class="trending-wrap">
         <h5>Sản phẩm HOT!</h5>
         <div class="">
         @foreach($products as $product)

         <div class="col-md-12 "> 
            <a href="details/{{$product['id']}}"> <img class="trending-img ml-4 " src="{{$product['gallery']}}" alt="Los Angeles"></a>
             
        </div>

          @endforeach
          </div>
     </div>

    </div>
</div>
</div>
    @endsection