<!-- File: app/Views/user/dashboard.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"> <!-- Tambahkan link CSS jika diperlukan -->
</head>

<body>
    <h1>Welcome to the User Dashboard, <?= session()->get('name') ?></h1>
    <a href="<?= site_url('logout') ?>">Logout</a>
</body>

</html>