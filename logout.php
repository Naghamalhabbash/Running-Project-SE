<?php
session_start();

// إذا ضغط المستخدم على تأكيد الخروج
if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    session_destroy(); // إنهاء الجلسة
    header("location: login.php"); // العودة لصفحة الدخول
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الخروج - مكتبة سناء</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma; 
            background: linear-gradient(135deg, #00b09b, #96c93d); 
            height: 100vh; 
            margin: 0; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        .logout-box { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.2); 
            width: 350px; 
            text-align: center; 
        }
        h2 { color: #333; }
        p { color: #666; margin-bottom: 25px; }
        .btn-confirm { 
            display: inline-block;
            width: 100%; 
            padding: 12px; 
            background: #e74c3c; 
            color: white; 
            border: none; 
            border-radius: 25px; 
            cursor: pointer; 
            font-size: 16px; 
            text-decoration: none;
            transition: 0.3s; 
        }
        .btn-confirm:hover { background: #c0392b; }
        .btn-cancel { 
            display: inline-block;
            margin-top: 15px; 
            color: #00b09b; 
            text-decoration: none; 
            font-size: 14px; 
        }
    </style>
</head>
<body>

    <div class="logout-box">
        <h2>تسجيل الخروج</h2>
        <p>هل أنتِ متأكدة أنكِ تريدين الخروج من نظام المكتبة؟</p>
        
        <a href="logout.php?confirm=true" class="btn-confirm">نعم، تسجيل الخروج</a>
        
        <br>
        <a href="dashboard.php" class="btn-cancel">لا، العودة للوحة التحكم</a>
    </div>

</body>
</html>