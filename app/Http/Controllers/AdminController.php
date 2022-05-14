<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /** Check Auth login */
    public function checkAuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return redirect()->route('index_admin');
        }else{
            return redirect()->route('login')->send();
        }
    }

    /**
     * Xử lý đăng nhập, đăng xuất của admin
     */
    public function authLogin (){
        return view('admin.login.loginForm');
    }

    public function confirmAuthLogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('users')->where('email',$email)->orWhere('password',$password)->first();
        if($result){
            toast('Đăng nhập thành công !', 'success')->autoClose(5000);
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return redirect()->route('index_admin');
        }else{
            toast('Đăng nhập không thành công !','error');
            //alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            //return view('admin.login.loginForm');
            return redirect()->route('login');
        }
    }
    public function logout(){
        $this->checkAuthLogin();
        Session::put('name',null);
        Session::put('id',null);
        toast('Đăng xuất thành công !', 'info');
        return redirect()->route('login');
    }

    /** Xử lý sản phẩm */
    public function index()
    {
        $this->checkAuthLogin();
        //Lấy dữ liệu từ db
        $products = DB::table('sanphams')
            ->join('chitiet_loaisanphams','sanphams.chitietloai_id','=','chitiet_loaisanphams.id')
            ->join('trangthais','sanphams.trangthai_id','=','trangthais.id')
            ->select('sanphams.*','chitiet_loaisanphams.ten_chitiet_loaisanpham','trangthais.ten_trangthai')
            ->get();
        $user_name = Session::get('name');
        //dd($user_name);
        return view('admin.dashboardProduct',compact('products','user_name'));
    }
    //view form sửa
    public function show_Form_Edit_Product($id){
        $this->checkAuthLogin();

        $user_name = Session::get('name');

        //lấy data
        $more_Categories = DB::table('chitiet_loaisanphams')->get();
        $tt = DB::table('trangthais')->get();
        $products = DB::table('sanphams')
        ->where('sanphams.id',$id)
        ->get();
        return view('admin.pages.formEditProduct',['getProductById'=>$products],compact('user_name','products','more_Categories','tt'));
    }
    //xử lý cập nhật
    public function update_Product(Request $request){
        $this->checkAuthLogin();

        //Set Timezone
        //$time = date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        //return redirect()->route('index_admin');
        //dd($time);
        $allRequest = $request -> all();
        $ma = $allRequest['ma'];
        $ten = $allRequest['ten'];
        $ctloai = $allRequest['chitietloai'];
        $mota = $allRequest['mota'];
        $trangthai = $allRequest['trangthai'];
        $gia = $allRequest['gia'];
        //Luu anh 
        $getImage='';
        if($request->hasFile('hinhanh')){
            //Hàm kiểm tra dữ liệu
            $this-> validate($request,[
                //kiểm tra đúng file đuôi .jpg, .jpeg, .png,..
                'hinhanh'=> 'mimes:jpg,jpge,png,gif|max:4096'
            ],[
                //tuỳ chỉnh hiển thị thông báo không thoả mãng điều kiện
                'hinhanh.mines'=>'Chi chap nhan hinh voi duoi....',
                'hinhanh.max' => 'Chi chap nhan file anh dung luong ko qua 4096MB',
            ]);

            //lưu file ảnh vào thư mục public/assets/img/product
            $img = $request->file('hinhanh');
            $getImage = 'product@'.$ma.'_'.$time.'_'.$img->getClientOriginalName();
            $destinationPath = public_path('asset/products/');
            $img->move($destinationPath,$getImage);
        }


        $data = array(
            'id' => $ma,
            'ten_sanpham'=> $ten,
            'chitietloai_id' => $ctloai,
            'img_sanpham' => $getImage,
            'mota_sanpham' => $mota,
            'trangthai_id' => $trangthai,
            'gia_sanpham' => $gia,
            
            'updated_at' => $time
        );
        //dd($data);
        $successUpdate = DB::table('sanphams')->where('id',$ma)->update($data);
        //dd($successUpdate);
        if($successUpdate){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Cập nhật thành công !', $ten);
            return redirect()->route('index_admin');
        }
        else{
            alert()->error('Lỗi !','Cập nhật thất bại !');
            return redirect()->route('index_admin');
        }

    }
    //Xử lý xoá sản phẩm
    public function delete_Product($id){
        $delete = DB::table('sanphams')->where('id',$id)->delete();

        if($delete){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Xoá chi tiết loại thành công !',$id);
            return redirect()->route('index_admin');
        }
        else{
            alert()->error('Lỗi !','Xoá chi tiết loại thất bại !');
            return redirect()->route('index_admin');
        }
    }
    //form thêm mới sản phẩm
    public function show_form_add_product(){
        $this->checkAuthLogin();

        $user_name = Session::get('name');
        $more_Categories = DB::table('chitiet_loaisanphams')->get();
        $tt = DB::table('trangthais')->get();
        //dd($categories);
        return view('admin.pages.formAddProduct',compact('user_name','more_Categories','tt'));
    }
   //Xử lý thêm mới sản phẩm
    public function save_product(Request $request){
        $this->checkAuthLogin();

        //Set Timezone
        //$time = date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        //return redirect()->route('index_admin');
        //dd($time);
        $allRequest = $request -> all();
        
        $ten = $allRequest['ten'];
        $ctloai = $allRequest['chitietloai'];
        $mota = $allRequest['mota'];
        $trangthai = $allRequest['trangthai'];
        $gia = $allRequest['gia'];
        //Luu anh 
        $getImage='';
        if($request->hasFile('hinhanh')){
            //Hàm kiểm tra dữ liệu
            $this-> validate($request,[
                //kiểm tra đúng file đuôi .jpg, .jpeg, .png,..
                'hinhanh'=> 'mimes:jpg,jpge,png,gif|max:4096'
            ],[
                //tuỳ chỉnh hiển thị thông báo không thoả mãng điều kiện
                'hinhanh.mines'=>'Chi chap nhan hinh voi duoi....',
                'hinhanh.max' => 'Chi chap nhan file anh dung luong ko qua 4096MB',
            ]);

            //lưu file ảnh vào thư mục public/assets/img/product
            $img = $request->file('hinhanh');
            $getImage = 'product@'.$ten.'_'.$time.'_'.$img->getClientOriginalName();
            $destinationPath = public_path('asset/products/');
            $img->move($destinationPath,$getImage);
        }


        $data = array(
            
            'ten_sanpham'=> $ten,
            'chitietloai_id' => $ctloai,
            'img_sanpham' => $getImage,
            'mota_sanpham' => $mota,
            'trangthai_id' => $trangthai,
            'gia_sanpham' => $gia,
            
            'updated_at' => $time
        );
        //dd($data);
        $successUpdate = DB::table('sanphams')->insert($data);
        //dd($successUpdate);
        if($successUpdate){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Thêm mới sản phẩm thành công !', $ten);
            return redirect()->route('index_admin');
        }
        else{
            alert()->error('Lỗi !','Thêm mới sản phẩm thất bại !');
            return redirect()->route('index_admin');
        }
    }



    /** Xử lý chi tiết loại sản phẩm */
    //View chi tiết loại
    public function show_Dashboard_More_Category(){
        $this->checkAuthLogin();

        // get user name for layout
        $user_name = Session::get('name');

        //get data for...

        $more_Categories = DB::table('chitiet_loaisanphams')
            ->join('loaisanphams','chitiet_loaisanphams.loaisanpham_id','=','loaisanphams.id')
            ->select('chitiet_loaisanphams.*','loaisanphams.ten_loaisanpham')
            ->get();

        return view('admin.dashboardMoreCategory',compact('more_Categories','user_name'));
    }

    //Form sửa chi tiết loại
    public function show_form_edit_more_category($id){
        $this->checkAuthLogin();

        $user_name = Session::get('name');

        //lấy data
        $categories = DB::table('loaisanphams')->get();
        $more_Categories = DB::table('chitiet_loaisanphams')
        ->where('chitiet_loaisanphams.id',$id)
        ->get();
        return view('admin.pages.formEditMoreCategory',['getMoreCategoryById'=>$more_Categories],compact('user_name','categories'));
    }
    //xử lý update chi tiêt loại
    public function update_more_category(Request $request){
        $this->checkAuthLogin();

        //Set Timezone
        //$time = date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        //Kiem tra gia tri rong
        $this->validate($request,[
            'ten' => 'required',
        ],
        [
            'ten' => 'This is null !',
        ]);
        $allRequest = $request -> all();
        $ma = $allRequest['ma'];
        $ten = $allRequest['ten'];
        $loai = $allRequest['loaisanpham'];

        $data = array(
            'id' => $ma,
            'ten_chitiet_loaisanpham'=> $ten,
            'loaisanpham_id' => $loai,
            'updated_at' => $time
        );
        //dd($data);
        $successUpdate = DB::table('chitiet_loaisanphams')->where('id',$ma)->update($data);
        //dd($successUpdate);
        if($successUpdate){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Cập nhật chi tiết loại thành công !', $ten);
            return redirect()->route('more_Category');
        }
        else{
            alert()->error('Lỗi !','Cập nhật chi tiết loại thất bại !');
            return redirect()->route('more_Category');
        }

    }
    //Xử lý xoá chi tiết loại
    public function delete_more_category($id){
        $delete = DB::table('chitiet_loaisanphams')->where('id',$id)->delete();

        if($delete){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Xoá chi tiết loại thành công !',$id);
            return redirect()->route('more_Category');
        }
        else{
            alert()->error('Lỗi !','Xoá chi tiết loại thất bại !');
            return redirect()->route('more_Category');
        }
    }

    /** Xử lý thêm mới chi tiết loại */
    //Show form
    public function show_form_add_more_category(){
        $this->checkAuthLogin();

        $user_name = Session::get('name');
        $categories = DB::table('loaisanphams')->get();
        //dd($categories);
        return view('admin.pages.formAddMoreCategory',compact('user_name','categories'));


    }
    //Lưu trữ
    public function save_more_category(Request $request){
        $this->checkAuthLogin();
         //Set Timezone
         //date_default_timezone_set("Asia/Ho_Chi_Minh");
         $time = Carbon::now('Asia/Ho_Chi_Minh');
         //Kiem tra gia tri rong
         $this->validate($request,[
             'ten' => 'required',
         ],
         [
             'ten' => 'This is null !',
         ]);
         $allRequest = $request -> all();
         $ma = $allRequest['ma'];
         $ten = $allRequest['ten'];
         $loai = $allRequest['loaisanpham'];
 
         $data = array(
            
             'ten_chitiet_loaisanpham'=> $ten,
             'loaisanpham_id' => $loai,
             'created_at' =>$time,
             'updated_at' =>$time,
         );
         
         $successUpdate = DB::table('chitiet_loaisanphams')->insert($data);
         //dd($successUpdate);
         if($successUpdate){
             //toast('Cập nhật thành công !', 'success')->autoClose(5000);
             alert()->success('Thêm mới chi tiết loại thành công  !', $ten);
             return redirect()->route('more_Category');
         }
         else{
             alert()->error('Lỗi !','Thêm mới chi tiết thất bại !');
             return redirect()->route('more_Category');
         }

    }


    public function show_Dashboard_Category(){
        $this->checkAuthLogin();

        $user_name = Session::get('name');

        $categories = DB::table('loaisanphams')->get();

        return view('admin.dashboardCategory',compact('categories','user_name'));
    }

     //Form sửa chi tiết loại
     public function show_form_edit_category($id){
        $this->checkAuthLogin();

        $user_name = Session::get('name');

        //lấy data
        
        $categories = DB::table('loaisanphams')
        ->where('loaisanphams.id',$id)
        ->get();
        return view('admin.pages.formEditCategory',['getCategoryById'=>$categories],compact('user_name'));
    }
    //xử lý update chi tiêt loại
    public function update_category(Request $request){
        $this->checkAuthLogin();

        //Set Timezone
        //$time = date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        //Kiem tra gia tri rong
        $this->validate($request,[
            'ten' => 'required',
        ],
        [
            'ten' => 'This is null !',
        ]);
        $allRequest = $request -> all();
        $ma = $allRequest['ma'];
        $ten = $allRequest['ten'];

        $data = array(
            'id' => $ma,
            'ten_loaisanpham'=> $ten,
            'updated_at' => $time
        );
        //dd($data);
        $successUpdate = DB::table('loaisanphams')->where('id',$ma)->update($data);
        //dd($successUpdate);
        if($successUpdate){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Cập nhật thể loại thành công !', $ten);
            return redirect()->route('Category');
        }
        else{
            alert()->error('Lỗi !','Cập nhật thể loại thất bại !');
            return redirect()->route('Category');
        }

    }
    //Xử lý xoá  loại
    public function delete_category($id){
        $delete = DB::table('loaisanphams')->where('id',$id)->delete();

        if($delete){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Xoá thể loại thành công !',$id);
            return redirect()->route('Category');
        }
        else{
            alert()->error('Lỗi !','Xoá thể loại thất bại !');
            return redirect()->route('Category');
        }
    }

    /** Xử lý thêm mới  loại */
    //Show form
    public function show_form_add_category(){
        $this->checkAuthLogin();

        $user_name = Session::get('name');
        //dd($categories);
        return view('admin.pages.formAddCategory',compact('user_name'));
    }
    //Lưu trữ
    public function save_category(Request $request){
        $this->checkAuthLogin();
         //Set Timezone
         //date_default_timezone_set("Asia/Ho_Chi_Minh");
         $time = Carbon::now('Asia/Ho_Chi_Minh');
         //Kiem tra gia tri rong
         $this->validate($request,[
             'ten' => 'required',
         ],
         [
             'ten' => 'This is null !',
         ]);
         $allRequest = $request -> all();
         $ten = $allRequest['ten'];
         $data = array(
            
             'ten_loaisanpham'=> $ten,
             'created_at' =>$time,
             'updated_at' =>$time,
         );
         
         $successUpdate = DB::table('loaisanphams')->insert($data);
         //dd($successUpdate);
         if($successUpdate){
             //toast('Cập nhật thành công !', 'success')->autoClose(5000);
             alert()->success('Thêm mới thể loại thành công  !', $ten);
             return redirect()->route('Category');
         }
         else{
             alert()->error('Lỗi !','Thêm mới thể loại thất bại !');
             return redirect()->route('Category');
         }

    }


    /** Xử lý User */
    public function show_Dashboard_User(){
        $this->checkAuthLogin();

        $user_name = Session::get('name');

        $users = DB::table('users')->get();

        return view('admin.dashboardAdminUser',compact('users','user_name'));
    }
    public function show_form_edit_user_admin($id){
        $this->checkAuthLogin();

        $user_name = Session::get('name');

        //lấy data
        
        $users = DB::table('users')
        ->where('users.id',$id)
        ->get();
        return view('admin.pages.formEditUserAdmin',['getUserAdminById'=>$users],compact('user_name'));
    }
    public function update_user_admin(Request $request){
        $this->checkAuthLogin();

        //Set Timezone
        //$time = date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        //Kiem tra gia tri rong
        $this->validate($request,[
            'ten' => 'required',
            'email' => 'required'
        ],
        [
            'ten' => 'This is null !',
            'email' => 'This is null !'
        ]);
        $allRequest = $request -> all();
        $ma = $allRequest['ma'];
        $ten = $allRequest['ten'];
        $email = $allRequest['email'];
        $pass = $allRequest['pass'];

        $data = array(
            'id' => $ma,
            'name'=> $ten,
            'email' => $email,
            'password' => $pass,
            'updated_at' => $time
        );
        //dd($data);
        $successUpdate = DB::table('users')->where('id',$ma)->update($data);
        //dd($successUpdate);
        if($successUpdate){
            //toast('Cập nhật thành công !', 'success')->autoClose(5000);
            alert()->success('Cập nhật nhân viên thành công !', $ten);
            return redirect()->route('user');
        }
        else{
            alert()->error('Lỗi !','Cập nhật nhân viên thất bại !');
            return redirect()->route('user');
        }
    }
    public function show_form_add_user_admin(){
        $this->checkAuthLogin();

        $user_name = Session::get('name');
        //dd($categories);
        return view('admin.pages.formAddAdminUser',compact('user_name'));
    }
    public function save_user_admin(Request $request){
        $this->checkAuthLogin();
         //Set Timezone
         //date_default_timezone_set("Asia/Ho_Chi_Minh");
         $time = Carbon::now('Asia/Ho_Chi_Minh');
         //Kiem tra gia tri rong
         $this->validate($request,[
            'ten' => 'required',
            'email' => 'required'
        ],
        [
            'ten' => 'This is null !',
            'email' => 'This is null !'
        ]);
        $allRequest = $request -> all();
        
        $ten = $allRequest['ten'];
        $email = $allRequest['email'];
        $pass = $allRequest['pass'];

        $data = array(
            
            'name'=> $ten,
            'email' => $email,
            'password' => bcrypt($pass),
            'created_at'=>$time,
            'updated_at' => $time
        );
         //dd($data);
         $successUpdate = DB::table('users')->insert($data);
         //dd($successUpdate);
         if($successUpdate){
             //toast('Cập nhật thành công !', 'success')->autoClose(5000);
             alert()->success('Thêm mới nhân viên thành công  !', $ten);
             return redirect()->route('user');
         }
         else{
             alert()->error('Lỗi !','Thêm mới nhân viên thất bại !');
             return redirect()->route('user');
         }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
