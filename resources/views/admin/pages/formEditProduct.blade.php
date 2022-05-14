@extends('admin.layouts.layoutAdmin')
@section('styles')
@endsection


@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật chi tiết loại sản phẩm</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('updateProduct') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table">

                <tbody>
                    <tr>
                        <td scope="row"> Mã sản phẩm :</td>
                        <td><input type="text" style="min-width: 600px;" name="ma" value="{!! $getProductById[0]->id !!}" readonly></td>

                    </tr>
                    <tr>
                        <td scope="row">Tên sản phẩm :</td>
                        <td><input type="text" name="ten" style="min-width: 600px;" value="{{ $getProductById[0]->ten_sanpham}}"></td>

                    </tr>

                    <tr>
                        <td scope="row">Chi tiết loại sản phẩm :</td>
                        <td>
                            <select name="chitietloai" id="" style="min-width: 250px;">
                                @foreach($more_Categories as $m_cates)
                                <option value="{{$m_cates->id}}"
                                    @foreach($getProductById as $get)
                                        @if($get->chitietloai_id == $m_cates->id)
                                        selected = "{{$m_cates->id}}"
                                        @endif
                                    @endforeach >
                                    {{$m_cates->ten_chitiet_loaisanpham}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Hình ảnh:</td>
                        <td>
                            <input type="file" name="hinhanh"  value="{{ $getProductById[0]->img_sanpham}}">
                            <br>
                            <br>
                            <img src="../../../../../asset/products/{{ $getProductById[0]->img_sanpham}}" alt="" height="140px" width="240px">
                        </td>
                        
                    </tr>
                    <tr>
                        <td scope="row">Mô tả :</td>
                        <td><textarea name="mota" rows="5" cols="70">{{ $getProductById[0]->mota_sanpham}} </textarea></td>

                    </tr>
                    <tr>
                        <td scope="row">Trạng thái :</td>
                        <td>
                            <select name="trangthai" id="" style="min-width: 250px;">
                                @foreach($tt as $trangthai)
                                <option value="{{$trangthai->id}}"
                                    @foreach($getProductById as $get)
                                        @if($get->trangthai_id == $trangthai->id)
                                        selected = "{{$trangthai->id}}"
                                        @endif
                                    @endforeach >
                                    {{$trangthai->ten_trangthai}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Giá bán :</td>
                        <td><input type="text" name="gia" style="min-width: 600px;" value="{{ $getProductById[0]->gia_sanpham}}"></td>

                    </tr>



                </tbody>
            </table>

            <input class="btn btn-primary" type="submit" style="min-width: 150px; margin-left:10px " value="Cập nhật">

        </form>
    </div>
    <!-- /.container-fluid -->

</div>


@endsection
@section('scripts')
@endsection

