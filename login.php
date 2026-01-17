<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // استعلام للتحقق من بيانات المستخدم
    $sql = "SELECT id FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['login_user'] = $user;
        header("location: dashboard.php"); // الانتقال للوحة التحكم
    } else {
        $error = "البيانات غير صحيحة!"; 
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Sanaa Library - Login</title>
    <style>
        /* ستايل عصري بألوان هادئة */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #00b09b, #96c93d); height: 100vh; display: flex; justify-content: center; align-items: center; margin: 0; }
        .login-container { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 320px; text-align: center; }
        h2 { color: #333; margin-bottom: 25px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #eee; border-radius: 25px; outline: none; box-sizing: border-box; }
        input:focus { border-color: #00b09b; }
        button { width: 100%; padding: 12px; background: #00b09b; color: white; border: none; border-radius: 25px; cursor: pointer; font-size: 16px; transition: 0.3s; }
        button:hover { background: #008f7d; }
        .error { color: #e74c3c; margin-top: 15px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>تسجيل الدخول</h2>
        <form method="post">
            <input type="text" name="username" placeholder="اسم المستخدم" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">دخول للمكتبة</button>
            <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </div>
</body>
</html>