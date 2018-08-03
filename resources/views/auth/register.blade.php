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
<body class=" Register_page">  



    <div class="login-wrapper">
        <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
            <div class="text-center">
                <br/><br/>
                <img src="http://contenedordearte.org/img/asociados/Fraktal.png" alt="" height="200"/>
            </div>
            <form class="" role="" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group">
                        <label class="sr-only" for="exampleInputEmail2">name</label>
                        <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                        <input type="text" name="name" class="form-control" required="required" id="name" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label class="sr-only" for="InputPassword">E-Mail Address</label>
                        <div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
                        <input type="email" name="email" class="form-control" required="required" id="email" placeholder="Ingrese su Correo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label class="sr-only" for="InputPassword">Password</label>
                        <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="password" name="password" class="form-control" required="required" id="password" placeholder="Ingrese su Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <label class="sr-only" for="InputPassword">Confirm Password</label>
                        <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="password" name="password_confirmation" class="form-control" required="required" id="password" placeholder="Ingrese su Password">
                    </div>

                </div> 

                

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Registrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="assets/js/jquery-1.11.2.min.js"></script>

</body>
</html>
