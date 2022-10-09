
<div class="background">
    <div class="listloaihang">
        <h2>Quản lí loại hàng</h2>
        <table border="1">
            <thead>
                <th></th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                <?php 
                    if(!empty($listLoai)){
                        foreach($listLoai as $key=>$item){
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td><?php echo $item["MaLoai"]?></td>
                    <td><?php echo $item["TenLoai"]?></td>
                    <td><a href="?act=fixLoai&Maloai=<?php echo $item["MaLoai"]?>" class="sua">Sửa</a></td>
                    <td><a href="?act=DelLoai&Maloai=<?php echo $item["MaLoai"]?>" class="xoa">Xóa</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="btn">
            <input type="button" name="all" value="Chon tat ca">
            <input type="button" name="leave" value="Bo chon tat ca">
            <input type="button" name="del" value="Xoa cac muc da chon">
            <a href="danhmuc">Nhập thêm</a>
        </div>
    </div>
</div>