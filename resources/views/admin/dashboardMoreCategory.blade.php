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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã chi tiết loại</th>
                        <th>Tên chi tiết loại</th>
                        <th>Loại sản phẩm</th>

                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã chi tiết loại</th>
                        <th>Tên chi tiết loại</th>
                        <th>Loại sản phẩm</th>
                        <th>Thao tác</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(isset($more_Categories))
                    @foreach ($more_Categories as $more_category)
                    <tr>
                        <td> {{$more_category->id }}</td>
                        <td> {{$more_category->ten_chitiet_loaisanpham }}</td>
                        <td> {{$more_category->ten_loaisanpham}} </td>


                        <td>
                            
                            <a href="/admin/Dashboard/MoreCategory/Edit/{{$more_category->id}}/" style="text-decoration: none;">&nbsp;<img src="../../asset/admin/img/edit.png" alt="Edit" width="25px" height="25px"> Sửa</a> <br> <br>
                            <a href="/admin/Dashboard/MoreCategory/Delete/{{$more_category->id}}/" style="text-decoration: none;"><img src="../../asset/admin/img/delete.png" alt="Delete" width="25px" height="25px">Xoá </a>
                            
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