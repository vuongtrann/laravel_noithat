<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $cates= DB::table('loaisanphams')->get();
        $catesCT = DB::table('chitiet_loaisanphams')->get();
        //dd($cate);
        //return view('layouts.layoutMaster');

        $product = DB::table('sanphams')->where('trangthai_id','=','1')->get();
        $ban_salon = DB::table('sanphams')->where('ten_sanpham','like','%ban%')->orWhere('ten_sanpham','like','%salon%')->get();
        $sanpham_khac = DB::table('sanphams')->where([['ten_sanpham','not like', '%ban%'],['ten_sanpham','not like','%salon%'],])->get();
        //dd($sanpham_khac);
        return view('product',compact('product','ban_salon','sanpham_khac','cates','catesCT'));
        
    }

    public function showSingleProduct(Request $request)
    {
        //lấy dữ liệu hiện lên menu
        $cates= DB::table('loaisanphams')->get();
        $catesCT = DB::table('chitiet_loaisanphams')->get();
        //page
        $singleProductData = Sanpham::where('id',$request->id)->first();
        $spCungLoai= Sanpham::where('chitietloai_id',$singleProductData->chitietloai_id)->get();
        $cotheBanThich = DB::table('sanphams')->where('trangthai_id','=','1')->limit(5)->get();
        //dd($spCungLoai);
        return view('pages.singleProduct',compact('singleProductData','cates','catesCT','spCungLoai','cotheBanThich'));
    }

    public function showAllProduct(){
        //lấy dữ liệu hiện lên menu
        $cates= DB::table('loaisanphams')->get();
        $catesCT = DB::table('chitiet_loaisanphams')->get();

        $allProduct = DB::table('sanphams')->where('trangthai_id','=','1')->paginate(12);
        //dd($allProduct);
        return view('pages.allProduct',compact('cates','catesCT', 'allProduct'));
    }

    public function showListProduct ( Request $request){
        $cates= DB::table('loaisanphams')->get();
        $catesCT = DB::table('chitiet_loaisanphams')->get();

        //page
        $dataForListProduct = Sanpham::where('chitietloai_id',$request->id)->paginate(12);
        //dd($dataForListProduct);
        if($dataForListProduct->isEmpty()){
            return view('pages.errors.notFound',compact('cates','catesCT'));
        }else{
        return view('pages.listProduct',compact('cates','catesCT','dataForListProduct'));
        }
    }


    public function showListProductInCategory(Request $request){
        $cates= DB::table('loaisanphams')->get();
        $catesCT = DB::table('chitiet_loaisanphams')->get();

        $dataForListProduct = DB::table('sanphams')
                                ->join('chitiet_loaisanphams','sanphams.chitietloai_id','=','chitiet_loaisanphams.id')
                                ->join('loaisanphams','chitiet_loaisanphams.loaisanpham_id','=','loaisanphams.id')
                                ->where('loaisanphams.id',$request->id)
                                ->paginate(12);
        //dd($dataForListProduct);
        if($dataForListProduct->isEmpty()){
            return view('pages.errors.notFound',compact('cates','catesCT'));
        }else{
        return view('pages.listProduct',compact('cates','catesCT','dataForListProduct'));
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
