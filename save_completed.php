<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newCompleted = $_POST['completed']; // ค่าที่ส่งมาจากฟอร์ม
    $file = 'completed_data.txt'; // ชื่อไฟล์ที่เก็บค่าทั้งหมด

    // อ่านค่าปัจจุบันจากไฟล์ (ถ้ามี)
    $currentCompleted = 0;
    if (file_exists($file)) {
        $currentCompleted = (int)file_get_contents($file);
    }

    // บวกค่าที่ได้รับกับค่าที่มีอยู่
    $updatedCompleted = $currentCompleted + (int)$newCompleted;

    // บันทึกค่ารวมใหม่ลงในไฟล์
    file_put_contents($file, $updatedCompleted);

    // ส่งผู้ใช้ไปยัง result.html
    header('Location: result.html');
    exit;
}
?>
