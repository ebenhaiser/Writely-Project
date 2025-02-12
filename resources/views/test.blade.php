<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        ul.timeline {
            list-style-type: none;
            position: relative;
        }

        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline>li {
            margin: 10px 0;
            padding-left: 20px;
            margin-left: 30px;
        }

        ul.timeline>li:before {
            content: 'img/profilePicture/default.jpg';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid black;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        h4 {
            font-weight: 700;
            font-size: 20px;
        }

        h5 {
            font-size: 17px;
        }
    </style>
    <h4>Education</h4>
    <ul class="timeline">
        <li>
            <h5>Major</h5>
            <h6>2022 - 2024</h6>
            <p><i>Univ</i></p>
            <p>inilah</p>
        </li>
    </ul>
    </div>
</body>

</html>
