<?php require('header.php');  ?>

<?php require('db.php');  ?>

<?php 
      $sql = 'SELECT * FROM person';
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $persons=$stmt->fetchAll(PDO::FETCH_OBJ);


?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2 class="text-right">ھەممە ئۇچۇرلار</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered"  dir="rtl">
                <tr>
                    <td>ID</td>
                    <td>ئىسىم</td>
                    <td>خەت ساندۇق</td>
                    <td>باشقۇرۇش</td>
                </tr>
                <?php foreach($persons as $person):  ?>
                <tr>
                    <td><?= $person->id;  ?></td>
                    <td><?= $person->username;  ?></td>
                    <td><?= $person->email;  ?></td>
                    <td>
                        <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">ئۆزگەرتىش</a>
                        <a onclick="return confirm('راسلا ئۈچۈرۈمسىز؟')" href="delete.php?id=<?= $person->id ?>" class="btn btn-danger">ئۈچۈرۈش</a>
                    </td>
                </tr>
                <?php endforeach;  ?>
            </table>
        </div>
    </div>
</div>









<?php require('footer.php');  ?>    
