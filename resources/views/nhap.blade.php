<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <body>
    body{
    font-family: 'Roboto', sans-serif;
    padding:0;
    margin:0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

a{
    position: relative;
    padding: 15px 30px;
    color: #000;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 24px;
    border: 2px solid #000;
    box-sizing: border-box;
    transition: 0.5s;
}

a:before{
    content: '';
    position: absolute;
    top: 0;
    left:0;
    width: 50%;
    height: 100%;
    background: #000;
    z-index: -1;
    transform:  scale(0);
    transition: transform 0.5s;
    transform-origin: left;
}

a:hover:before{
    transform:  scaleX(1);
    transition: transform 0.5s;
    transform-origin: right;
}

    </style>
</head>


</body>
</html>
