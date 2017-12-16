<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .page-break {
            page-break-after: always;
        }

        .logo {
            margin-left: 15%;
            margin-top: -30px;
        }

        .underline .label {
            border: 1px solid lightblue;
            font-weight: bold;
            width: 60px;
            padding: 2px 10px;
            display: inline-block;
        }

        .underline .content {
            margin-left: -2px;
            border: 1px solid lightblue;
            border-left-width: 2px;
            padding: 2px 15px 2px 5px;
            width: 80%;
            display: inline-block;
        }

        .box .title {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin: 0;
        }

        .box {
            padding: 10px 20px;
            border: 1px solid lightblue;
            border-radius: 5px;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .box table {
            width: 100%;
            margin-top: 20px;
        }

        .box th {
            text-align: center;
        }

        .box table, .box th, .box td {
            border: 1px solid gray;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<img class="logo" src="{{ base_path() }}\public\images\pdfs\jilcs-header.png" >
<h2 style="text-align: center; margin-top: 0;">{{ $title }}</h2>
<div class="box">
    <p class="title">Personal Data</p>
    <p>1. Name of student</p>
    <div class="underline">
        <span class="label">Last</span><div class="content">Dolor</div>
    </div>
    <div class="underline">
        <span class="label">First</span><div class="content">Lorem</div>
    </div>
    <div class="underline">
        <span class="label">Middle</span><div class="content">Ipsum</div>
    </div>
    <p>2. Gender</p>
    <label><input type="checkbox" name="checkbox" value="value">Male</label>
    <label><input type="checkbox" name="checkbox" value="value">Female</label>
    <p>3. Date of Birth</p>
    <div class="underline">
        <div class="content">Dec. 26, 1999</div>
    </div>
    <p>4. Place of Birth</p>
    <div class="underline">
        <div class="content">Sto. Tomas</div>
    </div>
    <p>5. Nationality</p>
    <div class="underline">
        <div class="content">Filipino</div>
    </div>
    <p>6. Religion</p>
    <div class="underline">
        <div class="content">Christian</div>
    </div>
</div>

<div class="box">
    <p class="title">Educational Background</p>
    <p>8. School Last Attended</p>
    <div class="underline">
        <div class="content">Harvard University</div><span class="label" style="font-weight: normal">S.Y:</span>
    </div>
    <p>9. Level Applied For</p>
    <div class="underline">
        <div class="content">Grade12</div>
    </div>
</div>
<div class="page-break"></div>
<div class="box">
    <p class="title">Family Background</p>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Father</th>
                <th>Mother</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>Name</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Age</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Occupation</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Contact No.</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Work Address</td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
