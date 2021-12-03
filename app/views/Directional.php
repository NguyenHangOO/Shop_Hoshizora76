<?php 
    if(isset($data["relust"])){ ?> 
        <script>
            var r = confirm("Thêm giỏ hàng thành công! Bạn có muốn thanh toán?");
            if (r == true) {
                window.location="/Order/CartKhachHang";
            } else {
                history.back();
            }

        </script>
    
<?php } ?>