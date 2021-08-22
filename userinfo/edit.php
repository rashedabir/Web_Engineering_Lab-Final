<?php
$id=$_REQUEST['id'];
$con = mysqli_connect('127.0.0.1:3306','root','','labfinal') or die('Unable To connect');
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <title>Update User Record</title>
</head>

<body>
    <div class="container">
        <div class="form my-5 bg-white p-3 mx-auto">
            <h2 class="text-center py-5">Update Record</h2>
            <?php
            $status = "";
            $con = mysqli_connect('127.0.0.1:3306','root','','labfinal') or die('Unable To connect');
            if(isset($_POST['new']) && $_POST['new']==1)
            {
                $id=$_REQUEST['id'];
                $name =$_REQUEST['name'];
                $email =$_REQUEST['email'];
                $phone =$_REQUEST['phone'];
                $update="update users set name='".$name."', email='".$email."', phone='".$phone."' where id='".$id."'";
                mysqli_query($con, $update) or die(mysqli_error());
                $status = "Record Updated Successfully. </br></br>
                <a href='index.php'>View Updated Record</a>";
                echo '<p style="color:#FF0000;">'.$status.'</p>';
                }else {
            ?>
            <div>
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                    <div class="form-floating mb-3">
                        <input name="name" value="<?php echo $row['name'];?>" type="text" class="form-control"
                            placeholder="Name">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" value="<?php echo $row['email'];?>" type="email" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="phone" value="<?php echo $row['phone'];?>" type="text" class="form-control"
                            placeholder="Phone">
                        <label for="floatingInput">Phone</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3" value="Update"
                        name="submit">update</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>