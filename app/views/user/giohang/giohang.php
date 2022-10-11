
<div class="background">
    <div class="listloaihang">
        <h2>Giỏ hàng</h2>
        <?php 
            if(!empty($giohang) && isset($_SESSION["Login"]["user"])){
        ?>
            <table border="1">
                <thead>
                    <th></th>
                    <th>Hình ảnh</th>
                    <th>Tên SP</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    <?php
                        $tong = 0;
                        foreach($giohang as $item){
                            $tong += $item["DonGia"] * $item["SoLuong"];
                    ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="" id="">
                                </td>
                                <td><img src="<?php echo _WEB_ROOT_."/public/assets/client/images/products/".$item['HinhAnh'];?>"></td>
                                <td><?php echo $item["TenHangHoa"]?></td>
                                <td><?php echo $item["SoLuong"]?></td>
                                <td><?php echo $item["DonGia"]?></td>
                                <td><a href="?act=DelCart&MaGH=<?php echo $item["MaGioHang"]?>" class="xoa">Xóa</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                    <tr>
                        <td colspan="4">Tổng</td>
                        <td><?php echo $tong?></td>
                    </tr>
                </tbody>
        </table>
        <div class="btnCart">
            <input type="button" name="all" value="Chon tat ca">
            <input type="button" name="leave" value="Bo chon tat ca">
            <input type="button" name="del" value="Xoa cac muc da chon">
        </div>
        <?php
            }else{
                echo "Không có giỏ hàng nào!";
                echo "<a href='Trang-Chu'>Quay lại trang chủ</a>";
            }
        ?>
    </div>
</div>