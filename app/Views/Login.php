<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .no-text-decoration {
            text-decoration: none;
            color: #28a745;
            /* Warna teks hijau */
            transition: color 0.3s, text-shadow 0.3s;
            /* Transisi untuk efek smooth */
        }

        .no-text-decoration:hover {
            color: #28a745;
            /* Warna teks tetap hijau */
            text-shadow: 0 0 8px #28a745;
            /* Efek cahaya hijau di sekitar teks */
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form action="<?= site_url('login/process') ?>" method="post">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="text-center mt-3">
                    <a href="#">Forgot password?</a>
                </div>
            </form>
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="<?= site_url('register') ?>" class="text text-success no-text-decoration">Go to Register</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>