<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1>Registrasi Akun</h1>
    <form action="" method="get" class="mb-5">
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Nama">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div>
            <input type="submit" value="Daftar">
        </div>

    </form>
    <form action="form-beranda.php" method="post">
        <h2>Login User</h2>
        <div class="mb-1">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="password" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-1">
            <label for="password" class="form-label">Email address</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="password">
        </div>
         <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</body>
</html>