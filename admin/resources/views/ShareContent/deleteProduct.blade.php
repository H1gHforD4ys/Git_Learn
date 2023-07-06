@if(session()->has("productViewDelete"))
<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{route('delete-product')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Xóa sản phẩm</h4>
                <input value="<?php echo session()->get('productViewDelete.id') ?>" name="idsanphamxoa" type="hidden">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa sản phẩm: <?php echo session()->get("productViewDelete.tensanpham") ?></p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" value="Delete">
            </div>
        </form>
    </div>
</div>
@else
<div class="modal-dialog">
    <div class="modal-content">
        <form>
            <div class="modal-header">
                <h4 class="modal-title">Xóa sản phẩm</h4>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa sản phẩm</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" value="Xóa">
            </div>
        </form>
    </div>
</div>
@endif
