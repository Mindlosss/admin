<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sign Up | Abstack - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <link rel="shortcut icon" href="../../assets/images/favicon.ico">

    <link href="../../assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <link href="../../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="../../assets/js/config.js"></script>
</head>

<body class="h-100">

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card overflow-hidden text-center rounded-4 p-xxl-4 p-3 mb-0">
                    <a href="index.html" class="auth-brand mb-4">
                        <img src="../../assets/images/logo-dark.png" alt="dark logo" height="26" class="logo-dark">
                        <img src="../../assets/images/logo.png" alt="logo light" height="26" class="logo-light">
                    </a>

                    <h4 class="fw-semibold mb-2 fs-18">Welcome to Abstack Admin</h4>

                    <p class="text-muted mb-4">Enter your name , email address and password to access account.</p>

                    <form action="../../controllers/AuthController.php" method="POST" class="text-start mb-3">
                        
                        <input type="hidden" name="accion" value="registrar">

                        <?php 
                        session_start();
                        if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                        <?php endif; ?>

                        <div class="mb-2">
                            <input type="text" id="example-name" name="nombre" class="form-control"
                                placeholder="Enter your name" required>
                        </div>

                        <div class="mb-2">
                            <input type="email" id="example-email" name="correo" class="form-control"
                                placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" id="example-password" name="password" class="form-control"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">I agree to all <a href="#!"
                                        class="link-dark text-decoration-underline">Terms & Condition</a> </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary fw-semibold" type="submit">Sign Up</button>
                        </div>
                    </form>
                    <p class="text-nuted fs-14 mb-0">Already have an account? <a href="login.php"
                            class="fw-semibold text-danger ms-1">Login !</a></p>

                </div>
                <p class="mt-4 text-center mb-0">
                    <script>document.write(new Date().getFullYear())</script> © Abstack - By <span
                        class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
                </p>
            </div>
        </div>
    </div>

    <script src="../../assets/js/vendor.min.js"></script>

    <script src="../../assets/js/app.js"></script>

</body>

</html>