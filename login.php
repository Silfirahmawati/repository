<?php

require 'function.php';

if(!isset($_SESSION['login'])){
    //yaudah
} else {
    //belum login
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="" style="background: rgb(91,190,242);
     background: linear-gradient(90deg, rgba(91,190,242,1) 34%, rgba(158,222,255,1) 58%);">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center" >
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">




                                        <form method="post">
                                            <div class="form-group">
                                                <label  class="small mb-1"for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="username"type="text" placeholder="Enter Username" required />
                                            </div>
                                            <div class="form-group">
                                                <label  class="small mb-1"for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword"  name="password"type="password" placeholder="Enter Password" required/>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
