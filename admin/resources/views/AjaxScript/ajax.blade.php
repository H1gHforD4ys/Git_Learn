<script>
    function viewProductEdit(idProduct) {
        $.ajax({
            url: '/view-edit-product/' + idProduct, //Địa chỉ route
            type: 'GET',
        }).done(function(response) {
            //$("#editEmployeeModal").empty(); //Xóa nội dung hiện tại của phần tử có id là
            $("#editEmployeeModal").html(
            response); //Chèn nội dung phản hồi từ server vào phần tử có id là "change-item-cart"
            //alertify.success('Thêm sản phẩm thành công');
            //console.log(idProduct);
            //console.log(response);
        });
    };

    function viewDeleteProduct(idProduct) {
        $.ajax({
            url: '/view-delete-product/' + idProduct, //Địa chỉ route
            type: 'GET',
        }).done(function(response) {
            $("#deleteEmployeeModal").empty(); //Xóa nội dung hiện tại của phần tử có id là
            $("#deleteEmployeeModal").html(
                response); //Chèn nội dung phản hồi từ server vào phần tử có id là "change-item-cart"
            //alertify.success('Thêm sản phẩm thành công');
            //console.log(idProduct);
            //console.log(response);
        });
    };
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "search",
                type: "GET",
                data: {
                    'search': query,
                },
                success: function(data) {
                    $("#search_list").empty();
                    $('#search_list').html(data);
                }
            });
        });
    });
</script>
