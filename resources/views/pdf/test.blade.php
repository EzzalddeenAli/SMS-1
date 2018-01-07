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

        .sign-box {
            width: 90%;
            margin: 18px 5%;
        }

        .left-sign {
            width: 45%;
            margin: 0;
            border-top: 1px solid;
            display: inline-block;
            text-align: center;

        }

        .right-sign {
            width: 45%;
            margin: 0 0 0 9%;
            border-top: 1px solid;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
<img class="logo" src="{{ base_path() }}\public\images\pdfs\jilcs-header.png">
<h2 style="text-align: center; margin-top: 0;">{{ $title }}</h2>
<div class="box">
    <p class="title">Personal Data</p>
    <p>1. Name of student</p>
    <div class="underline">
        <span class="label">Last</span>
        <div class="content">Dolor</div>
    </div>
    <div class="underline">
        <span class="label">First</span>
        <div class="content">Lorem</div>
    </div>
    <div class="underline">
        <span class="label">Middle</span>
        <div class="content">Ipsum</div>
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
    <table>
        <thead>
        <tr>
            <th>Level</th>
            <th>Name Of School</th>
            <th>Year Attended</th>
            <th>Honors Awards</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Nursery</td>
            <td>JILCS Tanauan</td>
            <td>2004</td>
            <td>none</td>
        </tr>
        <tr>
            <td>Kinder</td>
            <td>JILCS Tanauan</td>
            <td>2005</td>
            <td>1st</td>
        </tr>
        <tr>
            <td>Preparatory</td>
            <td>JILCS Tanauan</td>
            <td>2006</td>
            <td>1st</td>
        </tr>
        </tbody>
    </table>
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
            <td>Mariosep Lurdes</td>
            <td>Maria Lurdes</td>
        </tr>
        <tr>
            <td>Age</td>
            <td>45</td>
            <td>42</td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td>Filipino</td>
            <td>Filipino</td>
        </tr>
        <tr>
            <td>Occupation</td>
            <td>Engineer</td>
            <td>House Wife</td>
        </tr>
        <tr>
            <td>Contact No.</td>
            <td>09178974467</td>
            <td>09164670912</td>
        </tr>
        <tr>
            <td>Work Address</td>
            <td>Creo Muntinlupa City</td>
            <td>Tech Muntinlupa City</td>
        </tr>
        </tbody>
    </table>
</div>

<div class="box" style="border-color: black;">
    <p class="title">Verification</p>
    <p style="margin-bottom: 30px;">I certify that the information given herein is correct and complete.
        Falsification or withholding of
        information requested in this form
        will automatically nullify my application and/or subject me to dismissal, even if already admitted. </p>

    <div class="sign-box">
        <p class="left-sign">Full name and Signature of Applicant</p>
        <p class="right-sign">Date</p>
    </div>

    <div class="sign-box">
        <p class="left-sign">Full name and Signature of Parents/Guardian</p>
        <p class="right-sign">Date</p>
    </div>
</div>
</body>
</html>
