

<div class="content">
    <div class="contentSP">
        <h3>Chi tiết sản phẩm</h3>
        <div class="boxSP">
            <img src="<?php echo _WEB_ROOT_."/public/assets/client/images/products/".$detailProduct[0]["HinhAnh"]?>" alt="">
            <div class="detail">
                <h4>Tên sản phẩm: <span><?php echo $detailProduct[0]["TenHangHoa"]?></span></h4>
                <h4>
                    <span>Đơn giá: <?php echo $detailProduct[0]["DonGia"]?>$</span> |
                    <span class="discount">Giảm giá: <?php echo $detailProduct[0]["DonGia"]?>$</span>
                </h4>
                <h4>Ngày nhập: <span><?php echo $detailProduct[0]["NgayNhap"]?></span></h4>
                <h4>Mô tả: <span><?php echo $detailProduct[0]["MoTa"]?></span></h4>
                <a href="" class="cart">Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>
    <div class="contentSP">
        <h3>Bình luận</h3>
        <iframe src="formcomment?IdProduct=<?php echo $_GET["IdProduct"];?>" frameborder="0" width="100%" height="300px"></iframe>
        <!-- <div class="noidung">
            <div class="comment">
                <div class="avarta">
                    <img src="<?php echo _WEB_ROOT_?>/public/assets/client/images/avatar/Banner.jpg" alt="">
                </div>
                <div class="boxComment">
                    <div class="contentComment">
                        <p class="name">B1001</p>
                        <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quas, non id dicta, porro perferendis eaque quod voluptates blanditiis totam, voluptatibus officiis tenetur nesciunt eligendi. Omnis modi natus autem doloribus.</p>
                    </div>
                    <small>Time</small>
                </div>
            </div>
        </div> -->
    </div>
    <div class="contentSP">
        <h3>Sản phẩm cùng loại</h3>
    </div>
</div>