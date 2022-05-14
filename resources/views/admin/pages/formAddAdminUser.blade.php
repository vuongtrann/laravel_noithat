@extends('admin.layouts.layoutAdmin')
@section('styles')
@endsection


@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm thể loại sản phẩm</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('save_user_admin') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table">

                <tbody>
                    <tr>
                        <td scope="row"> Mã nhân viên :</td>
                        <td><input type="text" style="min-width: 600px;" name="ma" value="Không cần nhập, hệ thống tự động nhập mã !" readonly></td>

                    </tr>
                    <tr>
                        <td scope="row">Tên nhân viên :</td>
                        <td><input type="text" name="ten" style="min-width: 600px;" value=""></td>

                    </tr>
                    <tr>
                        <td scope="row">Email :</td>
                        <td><input type="email" name="email" style="min-width: 600px;" value=""></td>

                    </tr>
                    <tr>
                        <td scope="row">Mật khẩu :</td>
                        <td><input type="text" name="pass" style="min-width: 600px;" value=""></td>

                    </tr>
                </tbody>
            </table>

            <input class="btn btn-primary" type="submit" style="min-width: 150px; margin-left:10px " value="Thêm mới">

        </form>
    </div>
    <!-- /.container-fluid -->

</div>


@endsection
@section('scripts')
@endsection

