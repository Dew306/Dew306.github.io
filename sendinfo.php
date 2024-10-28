<?php 
session_start();

function sendLineNotify($sToken, $sMessage) {
    $chOne = curl_init(); 
    curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($chOne, CURLOPT_POST, 1); 
    curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . urlencode($sMessage)); 
    $headers = array(
        'Content-type: application/x-www-form-urlencoded', 
        'Authorization: Bearer ' . $sToken,
    );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec($chOne); 

    if (curl_error($chOne)) { 
        $_SESSION['error'] = "ส่งข้อมูลแจ้งเตือนผิดพลาด: " . curl_error($chOne);
        header("location: index.php");
        exit;
    } else { 
        $_SESSION['success'] = "ลงทะเบียนสำเร็จ"; // ข้อความแสดงเมื่อส่งสำเร็จ
        header("location: index.php");
        exit;
    } 

    curl_close($chOne);   
}

// กำหนด Token
$sToken = "EYfnCaootnD5eJUoROaUqbkKLORfQp1iwo1N5mcNC8U"; // แทนที่ด้วย Token ที่ถูกต้อง

// รับข้อมูลจากฟอร์ม
if (isset($_POST['submit'])) { 
    $student_id = htmlspecialchars($_POST['student_id']);
    $fullname = htmlspecialchars($_POST['fullname']);
    
    // เวลาปัจจุบันของประเทศไทย
    date_default_timezone_set("Asia/Bangkok");
    $timestamp = date("Y-m-d H:i:s"); // เวลาที่ลงทะเบียน

    // ตรวจสอบว่าเลขนักศึกษาเป็นตัวเลข
    if (!preg_match('/^\d+$/', $student_id)) {
        echo "Invalid student ID format.";
        exit;
    }

    // สร้างข้อความที่จะส่ง
    $sMessage = "เช็คชื่อเข้าเรียน\n";
    $sMessage .= "User ID: " . $student_id . "\n";
    $sMessage .= "User fullname: " . $fullname . "\n";
    $sMessage .= "เวลาที่ลงทะเบียน: " . $timestamp . "\n"; // แสดงเวลาจริงที่กดส่ง

    // ส่งข้อความผ่านฟังก์ชัน
    sendLineNotify($sToken, $sMessage);
}
?>
