@extends('admin.layouts.layoutAdmin')
@section('styles')
@endsection


@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật nhân viên</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('update_user_admin') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table">

                <tbody>
                    <tr>
                        <td scope="row"> Mã nhân viên :</td>
                        <td><input type="text" style="min-width: 600px;" name="ma" value="{!! $getUserAdminById[0]->id !!}" readonly></td>

                    </tr>
                    <tr>
                        <td scope="row">Tên nhân viên :</td>
                        <td><input type="text" name="ten" style="min-width: 600px;" value="{{ $getUserAdminById[0]->name}}"></td>

                    </tr>
                    <tr>
                        <td scope="row">Email :</td>
                        <td><input type="text" name="email" style="min-width: 600px;" value="{{ $getUserAdminById[0]->email}}"></td>

                    </tr>
                    <tr>
                        <td scope="row">Mật khẩu (Không nhập) :</td>
                        <td><input type="text" name="pass" style="min-width: 600px;" value="{{ $getUserAdminById[0]->password}}" readonly></td>

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

