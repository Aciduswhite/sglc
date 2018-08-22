<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">


    <meta name="googlebot" content="noindex">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

</head>
<body class=" login_page">  



 <div class="login-wrapper">
    <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">

        <div class="text-center">
            <br/><br/><br/><br/>

            <img src="assets/images/logo-fraktal.png" alt="" height="92"/>
        </div>

        <form id="Formvalidate" class="" action="login" role="form" method="post">

         {!! csrf_field() !!}

         <div class="form-group">
            <div class="input-group">
                <!--<label class="sr-only" for="exampleInputEmail2">Usuario</label>-->
                <div class="input-group-addon">Usuario</div>
                <input type="" name="user" class="form-control" required="required" id="user" placeholder="Ingrese su Usuario">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <!--<label class="sr-only" for="InputPassword">Contraseña</label>-->
                <div class="input-group-addon">Contraseña</div>
                <input type="password" name="password" class="form-control" required="required" id="InputPassword" placeholder="Ingrese su Password">
            </div>

        </div>

        <div class="text-center">
            <input class="btn btn-lg btn-default " id="btn_send" type="submit" value="Acceder"/>
            <!--{{ HTML::link('registrar', 'Registrar', array('class' => 'btn btn-lg btn-default')) }}-->
        </div>

    </form>
    

    @if($errors->any())

    <br/>

    <div class='alert alert-warning text-center' role='alert'>
        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
        <span class='sr-only'>Error:</span>{{$errors->first()}}
    </div>

    @endif


</div>


</div>




<script src="assets/js/jquery-1.11.2.min.js"></script>

</body>
</html>
