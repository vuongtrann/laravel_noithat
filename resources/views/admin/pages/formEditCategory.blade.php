@extends('admin.layouts.layoutAdmin')
@section('styles')
@endsection


@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật thể loại sản phẩm</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('update_Category') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table">

                <tbody>
                    <tr>
                        <td scope="row"> Mã thể loại :</td>
                        <td><input type="text" style="min-width: 600px;" name="ma" value="{!! $getCategoryById[0]->id !!}" readonly></td>

                    </tr>
                    <tr>
                        <td scope="row">Tên thể loại :</td>
                        <td><input type="text" name="ten" style="min-width: 600px;" value="{{ $getCategoryById[0]->ten_loaisanpham}}"></td>

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

