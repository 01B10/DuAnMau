

<div class="background">
    <div class="listloaihang">
        <h2>Chi tiết bình luận</h2>
        <?php 
            if(!empty($listBL)){
        ?>
            <table border="1">
                <thead>
                    <th></th>
                    <th>Nội dung</th>
                    <th>Ngày BL</th>
                    <th>Người BL</th>
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
                                <td><?php echo $item["NoiDung"]?></td>
                                <td><?php echo $item["ThoiGianGui"]?></td>
                                <td><?php echo $item["HoTen"]?></td>
                                <td><a href="?act=xoabinhluan&IdBL=<?php echo $item["MaBL"]?>" class="xoa">Xóa</a></td>
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
            <a href="binhluan">Tổng hợp BL</a>
        </div>
        <?php
            }else{
                echo "Không có bình luận nào!";
                echo "<a href='TrangChu'>Quay lại trang chủ</a>";
            }
        ?>
    </div>
</div>