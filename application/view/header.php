</head>
    <style>
        .head{
            background-color: #000033;
            position: fixed;
            left: 0%;
            top: 0%;
            width: 100%;
            height: 48px;
            z-index: 10;
        }
        .right{
            float: right;
            display: flex;
            flex-direction:row;
            margin-right:15px;
        }
    </style>
    <script>
        function refresh(){
             location.reload(); 
        }
    </script>
<body style="background-color:#99FFFF1F;">
    <header class="head">
        <ul class="nav nav-tabs">
            <li class="active"><p style="font-size: 20px;color:snow;padding-top:8px;">高校公寓管理</p></li>
            <div class="right">
                <div style="margin-right: 35px;">
                    <li><img style="width:23px;height:23px;border-radius:100%;margin:10px auto;" src="<?php echo SUPPORT_P.'img/timg.jpg' ?>" onClick="refresh()"></li>
                </div>
                <div>
                    <li class="dropdown">
                        <p class="dropdown-toggle" data-toggle="dropdown" style="font-size: 18px;color: snow;padding-top:8px;">
                            我的 <span class="caret"></span>
                        </p>
                        <ul class="dropdown-menu pull-right">
                            <li><img src="<?php echo SUPPORT_P.'img/avatar.png' ?>" style="width: 100px;height: 100px;margin-top:5px; margin-left:28px;margin-bottom:5px;"></li>
                            <li style="text-align: center;"><a href="personalDetails.php"><p style="color:blue;margin-top: 5px;">个人信息</p></a></li>
                            <li class="divider"></li>
                            <li><button type="button" class="btn btn-danger" onClick="javascript:window.open('<?php echo APP_URL.'moca/logout'?>','_self')" style="float: right;margin-right:50px;">注销</button></li>
                        </ul>
                    </li>
                </div>
            </div>
        </ul>
</header>