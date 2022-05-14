@extends('admin.layouts.layoutAdmin')
@section('styles')
@endsection


@section('contents')
    <!-- Page Wrapper -->


       
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết loại sản phẩm</h6>
                    </div>
                    @include('sweetalert::alert')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Email</th>
                                        <th>Mật khẩu (đã mã hoá)</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Email</th>
                                        <th>Mật khẩu (đã mã hoá)</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(isset($users))
                                    @foreach ($users as $user)
                                    <tr>
                                        <td> {{$user->id }}</td>
                                        <td> {{$user->name}} </td>
                                        <td> {{$user->email }}</td>
                                        <td> {{$user->password}} </td>
                                        
                                        <td>
                                            <a href="/admin/Dashboard/User/Edit/{{$user->id}}/"><img src="../../asset/admin/img/edit.png" alt="Edit"
                                                    width="25px" height="25px"></a> <br> <br>
                                            <a href="{{route('form_add_user_admin')}}"><img src="../../asset/admin/img/user.png" alt="Delete"
                                                    width="28px" height="28px"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        
        <!-- End of Content Wrapper -->

    
    <!-- End of Page Wrapper -->

@endsection
@section('scripts')
@endsection

