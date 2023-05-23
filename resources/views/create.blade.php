<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มuserพนักงาน</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        .myButton {
            box-shadow: 3px 4px 0px 0px #899599;
            background: linear-gradient(to bottom, #27bff2 5%, #bdd7f2 100%);
            background-color: #27bff2;
            border-radius: 15px;
            border: 1px solid #d6bcd6;
            display: inline-block;
            cursor: pointer;
            color: #000000;
            font-family: Arial;
            font-size: 17px;
            padding: 7px 25px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #e1e2ed;
        }
        
        .myButton:hover {
            background: linear-gradient(to bottom, #bdd7f2 5%, #27bff2 100%);
            background-color: #bdd7f2;
        }
        
        .myButton:active {
            position: relative;
            top: 1px;
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    
    @section('content')
    <div class="container">
        <h2>สมัครสมาชิก</h2>
        <form id="registration-form" method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="name">ชื่อ:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                <label for="password">รหัสผ่าน:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                <label for="confirmpassword">ยืนยันรหัสผ่าน:</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                </div>
                <div class="form-group">
                <label for="position">ตำแหน่ง:</label>
                <input type="text" class="form-control" id="position" name="position" required>
                </div>
                <button type="submit" class="myButton">สมัครสมาชิก</button>
                </form>
                </div>
                @endsection

                </body>
                </html>
                






