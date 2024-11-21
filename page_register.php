<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <title>TripEase</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/logo_2.png">
    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="public/assets/css/style.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form page-r-logo">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="public/assets/images/logotravel.png" alt=""></a>
                                        <a href="index.html"><img src="public/assets/images/logotravel.png" alt="" class="light-logo m-auto"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="register.php" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="username" name="nama" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="*******" name="password" id="password" required>
                                                <div class="show-hide position-absolute" id="toggle-password" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                                    <i class="bi bi-eye" id="toggle-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Telephone</strong></label>
                                            <input type="text" class="form-control" placeholder="08 --- ---- -----" name="tlpn" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Address</strong></label>
                                            <input type="text" class="form-control" placeholder="" name="alamat" >
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="page_login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="public/assets/vendor/global/global.min.js"></script>
    <script src="public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="public/assets/js/dlabnav-init.js"></script>
    <script src="public/assets/js/custom.js"></script>

    <script>
        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');
        const toggleIcon = document.getElementById('toggle-icon');

        togglePassword.addEventListener('click', function() {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            if (type === 'password') {
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        });
    </script>
</body>

</html>
