<?php
session_start();
// التأكد من أن المستخدم لم يفتح الصفحة مباشرة بدون تسجيل دخول
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم مكتبة سناء</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma; background: #fdfdfd; margin: 0; }
        .header { background: #333; color: white; padding: 20px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .content { display: flex; justify-content: center; gap: 30px; padding: 50px; flex-wrap: wrap; }
        .card { background: white; border-radius: 15px; width: 250px; padding: 30px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05); text-decoration: none; color: #333; transition: 0.3s; border: 1px solid #eee; }
        .card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); border-color: #00b09b; }
        .card h3 { color: #00b09b; }
        .logout-btn { display: block; text-align: center; margin-top: 30px; color: #999; text-decoration: none; }
    </style>
</head>
<body>
    <div class="header">
        <h1>مكتبة سناء - Sanaa Library</h1>
        <p>مرحباً بكِ، <?php echo $_SESSION['login_user']; ?></p>
    </div>

    <div class="content">
        <a href="add_book.php" class="card">
            <h3>📖 إضافة كتاب</h3>
            <p>أضيفي كتب جديدة لقاعدة البيانات</p>
        </a>
        <a href="view_books.php" class="card">
            <h3>🔍 عرض المخزون</h3>
            <p>تعديل وحذف الكتب الحالية</p>
        </a>
    </div>

    <a href="logout.php" class="logout-btn">تسجيل الخروج</a>
</body>
</html>