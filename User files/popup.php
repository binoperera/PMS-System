<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>popup</title>
    <link rel="stylesheet" href="font-awesome.css">
    <style>

    *{
        margin: 0;
        padding: 0;
        box-sizing:border-box;
        font-family:tahoma;
        transition:all .2s linear;
        text-transform:capitalization;
    }
    .container{
        display:flex;
        align-item:center;
        justify-content:100vh;
        width:100vw;
        background:url(./image/home.jpg);
        background-size:cover;
        background-position:center;

    }
    #open{
        height: 50px;
        width: 180px;
        background:#fff;
        color:#333;
        font-size:25px;
        cursor: pointer;
        letter-spacing:2px;
        outline:none;
        border:none;
        box-shadow:0 3px 5px rgba(0,0,0,0.3);

    }
    #open:hover{
        letter-spacing:4px;
        opacity: .8;
    }
    .model-container{
        display:flex;
        align-item:center;
        justify-content:100vh;
        width:100vw;
        top:0;
        left:0;
        background:rgba(0,0,0,0.3);
    }

    .model-container .model{
        height: 400px;
        max-width: 350px;
        margin:0 10px;
        padding:20px;
        background:#fff;
        border-redius:5px;
        text-align:center;
        position:relative;


    }
    .model-container .model .fa-heart{
        font-size:100px;
        color:#f9ca24;
        padding-bottom:50px;
        margin:10px 0;
        text-shadow: 0 3px 5px rgba(0,0,0,0.3),30px 30px 0px #ccc, -30px 30px 0px #ccc;
    }
    .model-container .model h3{
        color:#333;
        font-size:25px;

    }
    .model-container .model p{
        color: #666;
        margin:20px 0;
    }
    .model-container .model button{
        height: 35px;
        width:120px;
        background:#333;
        color:#fff;
        outline:none;
        border:none;
        border: redius 50px;
        font: size 17px;
        cursor:pointer;
        box-shadow:0 3px 5px rgba(0,0,0,0.3);
    }
    .model-container .model button:hover{
     opacity: .8;
    }
    .model-container .model .fa-times{
        position: absolute;
        top:15px; right: 15px;
        color:#333;
        font-size:25px;
        cursor: pointer;
    }


    </style>

</head>
<body>
   
    
    <div class="model-container">

        <div class="model">
         <i class="fas fa-heart"></i>
         <p>If you posting your property we are checking your details are correct or not within one day by visiting  our argents to your place . Then they approved  we will publish your property by given packages. If your want to get more infor click here payments. Please be alert with your mobile</p>
         <button> ok</button>
         <button> <a href="package_select.php">payments</a></button>
         <button> cancle</button>
         <i id="close" class="fas fa-times"></i>

        </div>
    </div>

    <script src="jquery.jd" charset="utf-8"></scrirt>
    <script  type="text/javascript">
    $(document).ready(funtion(){
        $('#open').click(function(){
            $('.model-container').css('transform','scale(1)');
        });
    });
    $(document).ready(funtion(){
        $('#close').click(function(){
            $('.model-container').css('transform','scale(0)');
        });
    });
    
    </scrirt>
</body>
</html>