           <?php 
           use App\Http\Controllers\ProductController;
           $total=0;
           if(Session::has('user')){
           $total = ProductController::cartItem();}
           ?>

           <header><div class="container-fluid">
            <nav class=" navbar navbar-expand-sm bg-success navbar-dark ">
                <button type="button" class="navbar-toggler"  data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                
                    <div class="collapse  navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/home">
                                <img class="cus_logo" src="https://avatars.githubusercontent.com/u/2918581?s=280&v=4" alt="logo"></a></li>
                            <li class="nav-item"><a class="nav-link font-weight-bold " href="/home">Trang chủ</a></li>
                            <li class="nav-item"><a class="nav-link font-weight-bold" href="/myorders">Danh sách</a></li>
                        </ul>

                        <ul class="navbar-nav mr-auto">
                            <form action="/search" class="form-inline" >
                                <input type="text" name="search" placeholder="Tìm kiếm..." class="form-control mr-sm-3 cus_search">
                                <button class="btn btn-warning" type="submit">Tìm kiếm</button>
                            </form>
                        </ul>

                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="btn btn-warning " href="/cartlist">Giỏ hàng[{{$total}}]</a></li>
                                    @if(Session::has('user'))
                                <div class="btn-group ml-1 mr-5">
                                    <button class="btn btn-warning dropdown-toggle "
                                       type="button"
                                       id="dropdownMenuButton" data-toggle="dropdown">
                                   {{Session::get('user')['name']}}
                                    </button>
                                    <div class="dropdown-menu ">
                                       <a class="dropdown-item" href="#">Đơn hàng</a>
                                       <a class="dropdown-item" href="#">Tài khoản</a>
                                       <a class="dropdown-item" href="/logout">Đăng xuất</a>
                                    </div>
                                 </div>
                                 @else
                                 <li><a href="/login" class="btn btn-primary text-white ml-1">Đăng nhập</a></li>
                                 <li><a href="/register" class="btn btn-primary text-white ml-1">Đăng kí</a></li>
                                 @endif
                        </ul>
                    </div>
                </nav>
            </div></header> 