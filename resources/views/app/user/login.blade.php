<html>

<head>
    <title> Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/site.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div>

        <div class="parent-container mx-auto vh-100">
            <table width="100%" height="100%">
                <tr>
                    <td align="center" valign="middle">
                        <div class="loginholder">
                            <form id="loginForm" action="{{ route('login') }}" method="POST">
                                @csrf
                                <table style="background-color:white;" class="table-condensed">
                                    <tr>
                                        <a href="{{ route('app.index') }}"><img
                                                src="{{ asset('template/app/images/logo.png') }}" alt=""
                                                width="180px"></a>
                                    </tr>
                                    <tr>
                                        <td>
                                            <hr style="background-color:blue;height:1px;margin:0px;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Username:</b></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="inputbox" id="username" name="username"
                                                required />
                                            <br>
                                    </tr>
                                    <tr>
                                        <td><b>Password:</b></td>
                                    </tr>
                                    <tr>
                                        <td><input type="password" class="inputbox" id="password" name="password"
                                                required />
                                            <br>
                                            <p id="msg" class="mt-5 text-danger text-center"><?php if (isset($msg)) {
                                                echo $msg;
                                            } ?>
                                            </p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td align="center"><br />

                                            <input type="submit" class="btn-normal" name="login" id="login"
                                                value="LOGIN">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><br />
                                            <span class="forgetpassword"><a href="forget_password.php"> Forget your
                                                    Password ?</a></span>
                                        </td>

                                    </tr>
                                    <td><a href="register.php"> Register now</a></td>
                                    <tr>
                                        <td>
                                            <hr style="background-color:blue;height:1px;margin:0px;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"></td>
                                    </tr>

                                </table>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
