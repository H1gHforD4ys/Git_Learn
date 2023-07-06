@if(session()->has('productViewEdit'))
<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{route('edit-product')}}" method="POST">
            @csrf
            <input type="hidden" name="idsanpham" value="<?php echo session()->get('productViewEdit.id') ?>">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật thông tin sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tensanpham" value="<?php echo session()->get('productViewEdit.tensanpham') ?>" class="form-control" required>
                </div>
                {{-- <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" required>
                </div> --}}
                {{-- <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" required></textarea>
                </div> --}}
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <input type="text" name="tenloaisanpham" value="<?php echo session()->get('productViewEdit.tenloaisanpham') ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name="soluong" value="<?php echo session()->get('productViewEdit.soluong') ?>" class="form-control" required>
                </div>
                {{-- <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" required>
                </div> --}}
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                <input type="submit" class="btn btn-info" value="Lưu">
            </div>
        </form>
    </div>
</div>
@else
<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{route('edit-product')}}" method="POST">
            @csrf
            <input type="hidden" name="idsanpham" value="">
            <div class="modal-header">
                <h4 class="modal-title">Không có thông tin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tensanpham" value="Rỗng" class="form-control" required>
                </div>
                {{-- <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" required>
                </div> --}}
                {{-- <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" required></textarea>
                </div> --}}
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <input type="text" name="tenloaisanpham" value="Rỗng" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name="soluong" value="Rỗng" class="form-control" required>
                </div>
                {{-- <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" required>
                </div> --}}
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                <input type="submit" class="btn btn-info" value="Lưu">
            </div>
        </form>
    </div>
</div>
@endif

