<?php
    $servername = "localhost";
    $username = "root";
    $password = "";


    $conn = mysqli_connect($servername,$username,$password);
    if(!$conn)
        echo "Lỗi kết nối" . mysqli_connect_error();
    else
        echo "<h1 style='color:green;'>Kết nối thành công</h1>";    
?>