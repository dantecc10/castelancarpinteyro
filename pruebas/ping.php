<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .raccoon {
            width: 200px;
            height: 150px;
            background-color: #a9a9a9;
            position: relative;
            border-radius: 50px 50px 10px 10px;
            overflow: hidden;
        }

        .head {
            width: 100px;
            height: 100px;
            background-color: #a9a9a9;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 50px;
            transform: translateX(-50%);
        }

        .eye {
            width: 25px;
            height: 25px;
            background-color: #fff;
            border-radius: 50%;
            position: absolute;
            top: 40px;
        }

        .eye.left {
            left: 30px;
        }

        .eye.right {
            right: 30px;
        }

        .nose {
            width: 16px;
            height: 16px;
            background-color: #000;
            border-radius: 50%;
            position: absolute;
            top: 55px;
            left: 50px;
            transform: translateX(-50%);
        }

        .ear {
            width: 45px;
            height: 70px;
            background-color: #a9a9a9;
            border-radius: 50% 50% 60% 60%;
            position: absolute;
            top: -15px;
        }

        .ear.left {
            left: 0;
            transform: rotate(-10deg);
        }

        .ear.right {
            right: 0;
            transform: rotate(10deg);
        }
    </style>
</head>

<body>
    <div class="raccoon">
        <div class="head">
            <div class="eye left"></div>
            <div class="eye right"></div>
            <div class="nose"></div>
        </div>
        <div class="ear left"></div>
        <div class="ear right"></div>
    </div>
</body>

</html>