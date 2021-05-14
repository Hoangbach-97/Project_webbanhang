@extends('master')

@section('content')
<div class="container-fluid cus-margin cus_register">
  <div class="row justify-content-center ">
      <div class="col-12 col-md-4  " >
        <form action="/register" method="POST" class="cus-container">
          @csrf
          <div class="form-group">
            <label for="email">Tên người dùng</label>
            <input type="text" class="form-control" name="username" id="email" placeholder="Enter your name">
         </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
             </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Enter password">
             </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng kí</button>
          
        </form>
      </div>
  </div>
</div>
@endsection
