@extends('admin.layouts.layoutAdmin')
@section('styles')
@endsection


@section('contents')
    <!-- Page Wrapper -->


       
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(isset($products))
                                    @foreach ($products as $product)
                                    <tr>
                                        <td> {{$product->id }}</td>
                                        <td> {{$product->ten_sanpham }}</td>
                                        <td> {{$product->ten_chitiet_loaisanpham}} </td>
                                        <td> <img src="../../asset/products/{{$product->img_sanpham }}" alt="" height="140px"
                                                width="240px"></td>
                                        
                                        <td> {{$product->mota_sanpham}} </td>
                                        <td> {{$product->gia_sanpham}}</td>
                                        <td> {{$product->ten_trangthai}} </td>
                                        
                                        <td>
                                            <a href="/admin/Dashboard/Product/Edit/{{$product->id}}/"><img src="../../asset/admin/img/edit.png" alt="Edit"
                                                    width="25px" height="25px"></a> <br> <br>
                                            <a href="/admin/Dashboard/Product/Delete/{{$product->id}}/"><img src="../../asset/admin/img/delete.png" alt="Delete"
                                                    width="25px" height="25px"></a>
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

