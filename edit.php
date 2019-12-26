<?php
require 'db.php';

$id=$_GET["id"];
$sql="SELECT * FROM person WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->execute([':id'=>$id]);
$person=$stmt->fetch(PDO::FETCH_OBJ);







$msg = '';
if (isset ($_POST['username'])  && isset($_POST['email']) ) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $sql = 'UPDATE person SET username=:username,email=:email WHERE id=:id';
  $stmt = $conn->prepare($sql);
  if ($stmt->execute([':username' => $username, ':email' => $email,':id'=>$id])) {
    // $msg = 'data inserted successfully';
    header("Location: index.php");
  }else{
      $msg="insert some error";
  }
}
 ?>



<?php require("header.php");  ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2 class="card-title">ئۇچۇر ئۆزگەرتىش</h2>
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
                    <input type="text" value="<?= $person->username; ?>" id="name" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">خەت ساندۇق</label>
                    <input type="email" id="email"  value="<?= $person->email; ?>" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-info" name="submit" type="submit">جەزىملەشتۈرۈش</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require("footer.php");  ?>
