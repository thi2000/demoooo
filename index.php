<?php
    require("config.php");
    $ten = "Nguyễn Văn A";
    $so = 10;
    echo "<h1 style = 'color: red;'>Xin chào nhóm 14</h1>";
    echo $so;
    $u = "admin";
    $p = "123456";
    if(isset($_GET["btn"]))
    {
        $user = $_GET["us"];
        $pass = $_GET["pa"];
        echo "<h1 style='color:green;'>".$user."</h1>";
        echo "<h1 style='color:blue;'>$user</h1>";
        echo $pass;
        if ($user==$u && $pass==$p) {
          echo "chào mừng $user đến với nhóm 14";
          echo "<Script>alert('chào mừng $user')</Script>";
        } else {
            echo "Sai username hoặc password";
        }

      }
?>
<form action=" index.php" method="get">
      Nhập vào tên đăng Nhập
      <input type="text" name="us">
      Nhập vào mật khẩu
      <input type="password" name="pa">
      <input type="submit" value="Gửi dữ liệu" name="btn">
</form>