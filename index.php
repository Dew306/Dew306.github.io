<?php session_start(); ?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        body {
            background: linear-gradient(to right, #141e30, #243b55);
            font-family: 'Arial', sans-serif;
            margin: 0;
        }
        .header {
            background: white;
            color: black;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        }
        .header img {
            max-height: 75px;
            margin-top: 10px;
        }
        .container {
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            width: 500px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 250px auto;
        }
        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            letter-spacing: 1px;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #0072ff;
            border: none;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .alert {
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .input-group input {
            height: 60px;
            font-size: 18px;
            border: 2px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
            padding: 15px;
            width: 100%;
        }
        .input-group input:focus {
            border-color: #0072ff;
            box-shadow: 0 0 0 0.2rem rgba(0, 114, 255, 0.25);
        }
        footer {
            margin-top: 40px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="imgs/images (1).jpg" alt="Logo" style="max-width: 100%; height: auto;">
    </div>

    <div class="container">
        <h1><i class="fas fa-user-plus"></i> ลงทะเบียน</h1>
        <form action="sendinfo.php" method="POST">
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>

            <div class="input-group">
                <input type="text" class="form-control" name="student_id" required placeholder="กรุณากรอกเลขนักศึกษาของคุณ">
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="fullname" required placeholder="กรุณากรอกชื่อ-นามสกุลของคุณ">
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i> ลงทะเบียน</button>
        </form>
    </div>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> บริษัทของคุณ. สงวนลิขสิทธิ์.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
