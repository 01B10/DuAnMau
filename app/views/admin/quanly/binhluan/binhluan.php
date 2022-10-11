

<div class="background">
    <div class="listloaihang">
        <h2>Quản lí bình luận</h2>
        <?php 
            if(!empty($listBL)){
        ?>
            <table border="1">
                <thead>
                    <th></th>
                    <th>Hàng Hóa</th>
                    <th>Số bình luận</th>
                    <th>Mới nhất</th>
                    <th>Cũ nhất</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        foreach($listBL as $item){
                    ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="" id="">
                                </td>
                                <td><?php echo $item["TenHangHoa"]?></td>
                                <td><?php echo $item["SoBL"]?></td>
                                <td><?php echo $item["MAX"]?></td>
                                <td><?php echo $item["MIN"]?></td>
                                <td><a href="?act=binhluanct&IdProduct=<?php echo $item["MaSP"]?>" class="sua">Chi tiết</a></td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
        </table>
        <div class="btn">
            <input type="button" name="all" value="Chon tat ca">
            <input type="button" name="leave" value="Bo chon tat ca">
            <input type="button" name="del" value="Xoa cac muc da chon">
            <!-- <a href="khachhang">Nhập thêm</a> -->
        </div>
        <?php
            }else{
                echo "Không có bình luận nào!";
                echo "<a href='TrangChu'>Quay lại trang chủ</a>";
            }
        ?>
    </div>
</div>