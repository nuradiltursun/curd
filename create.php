<?php
require 'db.php';
$msg = '';
if (isset ($_POST['username'])  && isset($_POST['email']) ) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $sql = 'INSERT INTO person(username, email) VALUES(:username,:email)';
  $stmt = $conn->prepare($sql);
  if ($stmt->execute([':username' => $username, ':email' => $email])) {
    $msg = 'قۇشۇش تامام';
  }else{
      $msg="قۇشۇش مەغلۇپ بولدى";
  }
}
 ?>



<?php require("header.php");  ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2 class="card-title">يېڭىدىن بىر قېتىش</h2>
        </div>
        <div class="card-body">
            <?php 
            if(!empty($msg)){
               echo "<div class='alert alert-success'> $msg; </div>";
            }else{
                echo "";
            }
            
            ?>
            <form  method="post">
                <div class="form-group">
                    <label for="name">ئىسىم</label>
                    <input type="text" id="name" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">خەت ساندۇق</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-info" name="submit" type="submit">تاپشۇرۇش</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require("footer.php");  ?>
