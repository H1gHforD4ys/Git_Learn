<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                            class="material-icons">&#xE147;</i> <span>Thêm mới sản phẩm</span></a>
                    {{-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                            class="material-icons">&#xE15C;</i> <span>Delete</span></a> --}}
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        STT
                    </th>
                    <th>Tên sản phẩm </th>
                    <th>Loại sản phẩm</th>
                    <th>Số lượng</th>
                    <th></th>
                    <th>Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AllProduct as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tensanpham }}</td>
                        <td>{{ $item->tenloaisanpham }}</td>
                        <td>{{ $item->soluong }}</td>
                        <td></td>
                        <td>
                            <a href="#editEmployeeModal" onclick="viewProductEdit({{ $item->id }})"
                                class="edit" data-toggle="modal"><i class="material-icons"
                                    data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" onclick="viewDeleteProduct({{ $item->id }})"
                                class="delete" data-toggle="modal"><i class="material-icons"
                                    data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
