@extends('admin.layouts.layoutAdmin')
@section('styles')
@endsection


@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật chi tiết loại sản phẩm</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('update_moreCategory') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table">

                <tbody>
                    <tr>
                        <td scope="row"> Mã chi tiết loại :</td>
                        <td><input type="text" style="min-width: 600px;" name="ma" value="{!! $getMoreCategoryById[0]->id !!}" readonly></td>

                    </tr>
                    <tr>
                        <td scope="row">Tên chi tiết loại :</td>
                        <td><input type="text" name="ten" style="min-width: 600px;" value="{{ $getMoreCategoryById[0]->ten_chitiet_loaisanpham}}"></td>

                    </tr>

                    <tr>
                        <td scope="row">Loại sản phẩm :</td>
                        <td>
                            <select name="loaisanpham" id="" style="min-width: 250px;">
                                @foreach($categories as $cates)
                                <option value="{{$cates->id}}"
                                    @foreach($getMoreCategoryById as $get)
                                        @if($get->loaisanpham_id == $cates->id)
                                        selected = "{{$cates->id}}"
                                        @endif
                                    @endforeach >
                                    {{$cates->ten_loaisanpham}}
                                </option>
                                @endforeach
                            </select>
                        </td>
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

