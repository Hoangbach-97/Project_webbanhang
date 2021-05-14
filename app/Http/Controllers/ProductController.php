<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //
    public function index() {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    public function detail($id) {
        $data = Product::findOrFail($id);
        return view('detail', ['products' => $data]);
    }

    public function search(Request $request){
        $data = Product::
        where('name', 'like', '%' .$request->input('search').'%')
        ->get();
        if($request->input('search')==''){
            return redirect('/home');
        }
        return view('/search', ['products' => $data]);
    }
    public function addToCard(Request $request){
        if($request->session()->has('user')){
            // Khởi tạo đối tượng từ model Cart
            $cart = new Cart;

            // Lấy ID của user đã login tồn tại trong SESSION gán cho user_id của table carts
            $cart->user_id=$request->session()->get('user')['id'];

            // Lấy ID của sản phẩm khi người dùng click gán cho product_id trong table carts:xem trang details
            // Đây là giá trị input(hidden) name="product_id" khi người dùng click vào sản phảm có value=id 
             $cart->product_id=$request->product_id;
             $cart->save();
             return redirect('/home');
        }else{
            return redirect('/login');
        }
   }
   static function cartItem(){
    //    Lấy id trong session gán cho userId
       $userId = Session::get('user')['id'];
    //    Tìm kiếm  
       return Cart::where('user_id', $userId)->count();
   }
   public function getCardList() {
    $userId = Session::get('user')['id'];
    $productsList = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', $userId)
    ->select('products.*')
    ->get();
    return view('/cartlist', ['products' => $productsList]);

   }
   public function deleteList( $id){
      Cart::where('product_id',$id)->delete();
      return redirect('/cartlist');

      
   }
   public function orderNow() {
    //    lấy id người dùng để so khớp
    $userId = Session::get('user')['id'];
   $total = DB::table('carts')
//    join bảng carts và products
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', $userId)
    ->sum('products.price');
    return view('ordernow', ['total' =>$total]);
   }

   public function orderPlace(Request $request){

    $userId=Session::get('user')['id'];
    $allCart = Cart::where('user_id', $userId)->get();
    foreach($allCart as $cart){
        // Khởi tạo object tử Model
        // Gán các giá trị submit từ form và lưu lên DB
            $order =new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = 'pending';
            $order->address = $request->address;
            $order->save();
            // Sau khi submit thanh toán thì xóa thông tin đơn hàng người này ra khỏi Table Cards
            Cart::where('user_id', $userId)->delete();
                    }
                    return redirect('/home');

                }


        public function myOrders(){
            $userId = Session::get('user')['id'];
            $orders= DB::table('orders')
         //    join bảng carts và products
             ->join('products', 'orders.product_id', '=', 'products.id')
             ->where('orders.user_id', $userId)
             ->get();
             return view('/myorders', ['orders' =>$orders]);
        }
            }




