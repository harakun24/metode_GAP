<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrator | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/berau.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets_login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100 bg-dark">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="max-width:400px;padding-left: 28px;
    padding-right: 28px;">


                <form class="login100-form validate-form flex-sb flex-w" method="POST"
                    action="<?= route_to('cek_admin'); ?>">
                    <span class="login100-form-title p-b-53">
                        Admin
                    </span>

                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Username
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input required class="input100" type="text" name="username" onkeydown="return movepass()">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input required class="input100" id="pass" type="password" name="pass">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn" name="login">
                            masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets_login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets_login/vendor/bootstrap/js/popper.js"></script>
    <script src="/assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets_login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets_login/vendor/daterangepicker/moment.min.js"></script>
    <script src="/assets_login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/assets_login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/assets_login/js/main.js"></script>
    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <script>
    const flashAuth = $('.flash-auth').data('flashauth');

    if (flashAuth == 'Gagal') {
        swal({
            icon: 'error',
            title: 'Login ' + flashAuth,
            text: 'Username / Password Salah !!!'
            // timer: 2000
        });
    }

    function movepass(evt) {
        var e = event || evt; // for trans-browser compatibility
        var charCode = e.which || e.keyCode;

        // alert(charCode);
        if (charCode == 9) {
            document.getElementById('pass').focus();
            document.getElementById('pass').select();
            return false;
        }


    }
    // console.log(flashAuth);
    </script>

</body>

</html>