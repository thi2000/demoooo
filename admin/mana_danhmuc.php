<?php
    require("../config.php");
    if(isset($_GET["task"]) && $_GET["task"]=="delete")
    {
        //echo "mã danh mục là" . $_GET["id"];
        $sql_delete = "delete from tbl_danhmuc where ID_DanhMuc = ".$_GET["id"];
        if(mysqli_query($conn,$sql_delete))
        {
            echo "Xoá dữ liệu thành công";
        }
        else
        {
            echo "xoá dữ liệu thất baij" . mysqli_error($conn);
        }
    }
    if(isset($_POST["insert"]))
    {
        //khởi tạo biến sql insert data
        $sql_insert = "insert into tbl_danhmuc(Name_DanhMuc,Trang_Thai) values(N'".$_POST["tendm"]."',1)";
        //kiêm tra insert có thanh công hay không
        if(mysqli_query($conn,$sql_insert))
        {
            echo "thêm mới dữ liệu thành công";
            //điều hướng trang web tranhs lặp insert data khi f5
            header("Location:mana_danhmuc.php");
        }
        else
        {
            echo "không thêm mới thành công" . mysqli_error($conn);
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h1 style="text-align:center">Trang quản trị danh mục</h1>
            <!--thêm mới dữ liệu-->
            <div class="row">
                <form action="mana_danhmuc.php" method="post">
                    Nhập vào tên danh mục:
                    <input type="text" name="tendm">
                    <input type="submit" name="insert" value="thêm mới">
                </form>
            </div>

            <!--hiển thị và thao tác với dữ liệu-->
            <div class="row">
                <table class="table">
                    <!--tạo tiêu đề cho bảng-->
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên Danh Mục</th>
                        <th>Trạng Thái</th>
                        <th>Thao tác</th>
                    </tr>
                    <!--hiển thị thông tin trong bảng dữ liệu-->
                    <?php
                        //khởi tạo biến truy vấn bảng dữ liệu danh mục
                        $sql_select = "select * from tbl_danhmuc";
                        // khởi tạo biến kết quả để chứa dữ liệu vừa được truy vấn
                        $ketqua = mysqli_query($conn,$sql_select);
                        // kiểm tra xem số phần tử trong biến kết quả
                        if(mysqli_num_rows($ketqua)>0)
                        {
                            while($row = mysqli_fetch_assoc($ketqua))
                            {
                                if(isset($_GET["t"]) && $_GET["t"]=="update")
                                {
                                    if($_GET["ma"]==$row["ID_DanhMuc"])
                                    {
                                        echo "<tr><form action='mana_danhmuc.php' method='post'>";
                                        echo "<td>".$row["ID_DanhMuc"]."</td>";
                                        echo "<td><input type='text' name='update' value='".$row["Name_DanhMuc"]."'></td>";
                                        echo "<td>".$row["Trang_Thai"]."</td>";
                                        echo "<td>";
                                        echo "<input type='submit' name='btn_update' value='Cập nhật' class='btn btn-primary'>";
                                        
                                        echo "</td>";
                                        echo "</form></tr>";
                                    }
                                    else
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row["ID_DanhMuc"]."</td>";
                                        echo "<td>".$row["Name_DanhMuc"]."</td>";
                                        echo "<td>".$row["Trang_Thai"]."</td>";
                                        echo "<td>";
                                        echo "<a href='mana_danhmuc.php?t=update&ma=".$row["ID_DanhMuc"]."' class='btn btn-warning'>Cập nhật</a>";
                                        echo "<a href='mana_danhmuc.php?task=delete&id=".$row["ID_DanhMuc"]."' class='btn btn-danger'>Xoá</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                else
                                {
                                    echo "<tr>";
                                    echo "<td>".$row["ID_DanhMuc"]."</td>";
                                    echo "<td>".$row["Name_DanhMuc"]."</td>";
                                    echo "<td>".$row["Trang_Thai"]."</td>";
                                    echo "<td>";
                                    echo "<a href='mana_danhmuc.php?t=update&ma=".$row["ID_DanhMuc"]."' class='btn btn-warning'>Cập nhật</a>";
                                    echo "<a href='mana_danhmuc.php?task=delete&id=".$row["ID_DanhMuc"]."' class='btn btn-danger'>Xoá</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                               
                                
                            }
                        }
                        else
                        {
                            echo "bảng không có dữ liệu";
                        }
                    ?>
                    <!--<tr>
                        <td>1</td>
                        <td>Tin tức</td>
                        <td>1</td>
                        <td>
                            <a href='#' class='btn btn-warning'>Cập nhật</a>
                            <a href='#' class='btn btn-danger'>Xoá</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Thông báo</td>
                        <td>1</td>
                        <td>
                            <a href='#' class='btn btn-warning'>Cập nhật</a>
                            <a href='#' class='btn btn-danger'>Xoá</a>
                        </td>
                    </tr>-->
                </table>
            </div>
        </div>
    </body>
</html>