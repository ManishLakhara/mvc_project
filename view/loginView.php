<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <form action="index.php?controller=employees&action=check" method="post">
                <div class="mb-3">
                    <label for="exampleInputUser" class="form-label"><h1> User Name</h1></label>
                    <input type="text" class="form-control" name="username" id="exampleInputUser">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><h1> Password</h1></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                
                <input type="submit" value="Login" class="btn btn-warning"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>