<?php
// استدعاء ملف الاتصال بقاعدة البيانات
include('db.php');
session_start();

// حماية الصفحة: إذا لم يسجل المستخدم دخوله، يتم تحويله لصفحة الدخول
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
}

$message = ""; // متغير لتخزين رسالة النجاح أو الخطأ

// فحص إذا تم إرسال الفورم
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];

    // كود SQL لإضافة البيانات لجدول الكتب (books)
    $sql = "INSERT INTO books (title, author, price, isbn) VALUES ('$title', '$author', '$price', '$isbn')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "<p class='success'>✅ تمت إضافة الكتاب بنجاح!</p>";
    } else {
        $message = "<p class='error'>❌ خطأ في الإضافة: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إضافة كتاب جديد - مكتبة سناء</title>
    <style>
        /* ستايل متناسق مع صفحة تسجيل الدخول */
        body { font-family: 'Segoe UI', Tahoma; background: linear-gradient(135deg, #00b09b, #96c93d); height: 100vh; margin: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .form-container { background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 400px; text-align: center; }
        h2 { color: #333; margin-bottom: 20px; }
        input { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #eee; border-radius: 25px; outline: none; box-sizing: border-box; }
        input:focus { border-color: #00b09b; }
        button { width: 100%; padding: 12px; background: #00b09b; color: white; border: none; border-radius: 25px; cursor: pointer; font-size: 16px; transition: 0.3s; margin-top: 10px; }
        button:hover { background: #008f7d; }
        .back-link { display: block; margin-top: 15px; color: #666; text-decoration: none; font-size: 14px; }
        .back-link:hover { color: #00b09b; }
        .success { color: #27ae60; font-weight: bold; }
        .error { color: #e74c3c; font-weight: bold; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>📖 إضافة كتاب جديد</h2>
        
        <?php echo $message; // عرض رسالة النجاح أو الخطأ ?>

        <form method="post">
            <input type="text" name="title" placeholder="عنوان الكتاب" required>
            <input type="text" name="author" placeholder="اسم المؤلف" required>
            <input type="number" step="0.01" name="price" placeholder="سعر الكتاب" required>
            <input type="text" name="isbn" placeholder="رقم الـ ISBN" required>
            <button type="submit">حفظ في المكتبة</button>
        </form>

        <a href="dashboard.php" class="back-link">⬅️ العودة للوحة التحكم</a>
    </div>

</body>
</html>