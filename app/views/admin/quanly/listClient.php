
<div class="background">
    <div class="listloaihang">
        <h2>Quản lí khách hàng</h2>
        <?php 
            if(!empty($listClient)){
        ?>
            <table border="1">
                <thead>
                    <th></th>
                    <th>Mã KH</th>
                    <th>Họ và Tên</th>
                    <th>Mật khẩu</th>
                    <th>Địa chỉ email</th>
                    <th>Hình ảnh</th>
                    <th>Vai trò</th>
                    <th colspan="2">Action</th>
                </thead>
                <?php
                    foreach($listClient as $item){
                ?>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td><?php echo $item["MaKH"]?></td>
                            <td><?php echo $item["HoTen"]?></td>
                            <td><?php echo $item["MK"]?></td>
                            <td><?php echo $item["Email"]?></td>
                            <td><?php echo $item["HinhAnh"]?></td>
                            <td><?php if($item["VaiTro"] == 1){echo "khách hàng";}else{echo "Nhân viên";}?></td>
                            <td><a href="?act=fixClient&IdClient=<?php echo $item["MaKH"]?>" class="sua">Sửa</a></td>
                            <td><a href="?act=DelClient&IdClient=<?php echo $item["MaKH"]?>" class="xoa">Xóa</a></td>
                        </tr>
                    </tbody>
                <?php
                    }
                ?>
        </table>
        <div class="btn">
            <input type="button" name="all" value="Chon tat ca">
            <input type="button" name="leave" value="Bo chon tat ca">
            <input type="button" name="del" value="Xoa cac muc da chon">
            <a href="khachhang">Nhập thêm</a>
        </div>
        <?php
            }else{
                echo "Không có khách hàng nào!";
                echo "<a href='khachhang'>Thêm khách hàng</a>";
            }
        ?>
    </div>
</div>