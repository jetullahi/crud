<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "Select * from `crud` where id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE `crud` SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Data updated successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Tutorial</title>
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" required
                 placeholder="Enter your name" name="name" 
                 value=<?php echo $name;?> autocomplete="off">
              </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" required
                 placeholder="Enter your email"
                 value=<?php echo $email;?> name="email" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" required
                 placeholder="Enter your mobile number"
                 value=<?php echo $mobile;?> name="mobile" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" required
                 placeholder="Enter your password" name="password"
                 value=<?php echo $password;?> autocomplete="off">
            </div>
            

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>    
</body>
</html>