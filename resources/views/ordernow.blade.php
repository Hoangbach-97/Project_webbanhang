@extends('master')

@section('content')
{{-- <p>Xin chào</p> --}}
<div class="container-fluid">
    <div class="row ">
        <div class="col-sm-8 mt-3 ">
            <table class="table">
                <tbody>
                   <tr>
                      <td class="table-primary">Đơn giá</td>
                      <td>{{$total}}.000 đồng</td>
                   </tr>
                
                
                   <tr>
                      <td class="table-primary">Phí vận chuyển</td>
                      <td >0đ</td>
                   </tr>
                   <tr>
                      <td class="table-primary">Thuế VAT</td>
                      <td>0đ</td>
                   </tr>
                   <tr>
                      <td class="table-primary">Tổng</td>
                      <td class="text-danger">{{$total+1}}.000 đồng</td>
                   </tr>
                </tbody>
             </table>
           <div>
            <form action="/orderplace" method="post">
                @csrf
                <!-- Vertical -->
                <div class="form-group">
                   <label for="myEmail">Địa chỉ</label>
                   <textarea name="address" id = "myEmail" class="form-control" placeholder="Nhập địa chỉ..."></textarea><br ><br >
                   <label for="myPassword">Phương thức thanh toán</label><br ><br >
                   <input type="radio" value="cash" name="payment" id="myPassword" ><span class="ml-2">Online</span><br />
                   <input type="radio" value="cash"  name="payment" id="myPassword" ><span class="ml-2">Khi nhận hàng</span><br />
                   <input type="radio" value="cash"  name="payment" id="myPassword" ><span class="ml-2">Bom hàng</span><br />
                   <input type="radio" value="cash"  name="payment" id="myPassword" ><span class="ml-2">Tùy shiper</span><br />
                   <button type="submit" class="btn btn-primary">Thanh toán</button>
                </div>
             </form>
           </div>
        </div>
    </div>
</div>

@endsection




  