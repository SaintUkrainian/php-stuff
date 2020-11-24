<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Sign up form</title>
</head>
<body class="bg-dark">

<div class="container-sm bg-light rounded">

    <form action="register.php" class="needs-validation" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">First name</label>
            <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Last name</label>
            <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" name="login" class="form-control" id="exampleInputEmail1" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="6" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Roles</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="role" required>
                <option value="admin">admin</option>
                <option value="user" selected>user</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>

</div>

</body>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</html>
