<?php
// 1. الاتصال بقاعدة البيانات والجلسة
include('db.php');
session_start();

// 2. حماية الصفحة: التأكد من تسجيل الدخول
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    exit();
}

// 3. جلب بيانات الكتب من قاعدة البيانات sanaa_db
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عرض المخزون - مكتبة سناء</title>
    <style>
        /* ستايل متناسق مع المشروع */
        body { font-family: 'Segoe UI', Tahoma; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h2 { color: #00b09b; text-align: center; }
        
        /* تنسيق الجدول */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #eee; text-align: center; }
        th { background-color: #00b09b; color: white; }
        tr:hover { background-color: #f9f9f9; }

        .back-btn { display: inline-block; margin-bottom: 20px; text-decoration: none; color: #00b09b; font-weight: bold; }
        .no-data { text-align: center; padding: 20px; color: #999; }
    </style>
</head>
<body>

<div class="container">
    <a href="dashboard.php" class="back-btn">⬅️ العودة للوحة التحكم</a>
    <h2>🔍 كتب المكتبة الحالية</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>العنوان</th>
                <th>المؤلف</th>
                <th>السعر</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 4. عرض البيانات إذا كانت موجودة
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["title"] . "</td>
                            <td>" . $row["author"] . "</td>
                            <td>" . $row["price"] . " $</td>
                            <td>" . $row["isbn"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='no-data'>لا يوجد كتب مضافة حالياً</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>