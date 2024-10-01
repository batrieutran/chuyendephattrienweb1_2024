<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    // $_id = $_GET['id'];
    $_id = base64_decode($_GET['id']);
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else {
        $userModel->insertUser($_POST);
    }
    header('location: list_users.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST" id="userForm">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">

                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input class="form-control" id="username" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                         <small id="usernameError" class="form-text" style="color: red;"></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <small id="passwordError" class="form-text" style="color: red;"></small>
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>

<script>
    document.getElementById('userForm').addEventListener('submit', function(event) {
        var isValid = true;
        
        document.getElementById('usernameError').textContent = '';
        document.getElementById('passwordError').textContent = '';

        // Validate Username
        var userName = document.getElementById('username').value;
        var validateUsername = /^[A-Za-z0-9]{5,15}$/;

        if (userName.trim() === '') {
            document.getElementById('usernameError').textContent = 'Vui lòng nhập User Name';
            isValid = false;
        } else if (userName.includes(' ')) {
            document.getElementById('usernameError').textContent = 'User Name không được có chứa ký tự khoảng trắng';
            isValid = false;
        } else if (!validateUsername.test(userName)) {
            document.getElementById('usernameError').textContent = 'User Name phải chứa từ 5 đến 15 ký tự và chỉ bao gồm các ký tự A-Z, a-z, 0-9';
            isValid = false;
        }

        // Validate Password
        var password = document.getElementById('password').value;
        var validatePassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/;

        if (password.trim() === '') {
            document.getElementById('passwordError').textContent = 'Vui lòng nhập Password';
            isValid = false;
        } else if (password.includes(' ')) {
            document.getElementById('passwordError').textContent = 'Password không được chứa ký tự khoảng trắng';
            isValid = false;
        } else if (!validatePassword.test(password)) {
            document.getElementById('passwordError').textContent = 'Password phải bao gồm chữ thường, chữ HOA, số và ký tự đặc biệt, chiều dài từ 5 đến 10 ký tự';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>
