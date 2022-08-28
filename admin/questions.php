<?php

require_once 'core.inc.php';

if (loggedin()) {
    $id = getuserfield('id');
    $name = getuserfield('name');
    $email = getuserfield('email');
    $created_at = getuserfield('created_at');

    include('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-4  mb-5 pt-5">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100%;">
                <p class="">
                    <h1>Admin Dashboard</h1>
                    <?=$name?><br>
                    <?=$email?><br><?=$created_at?></p>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="pt-2">
                        <a href="/admin/home.php" class="nav-link active text-white">
                            Dashboard <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="users.php" class="nav-link text-white">
                            Users <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="topics.php" class="nav-link text-white">
                            Topics <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="questions.php" class="nav-link text-white">
                            Questions <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="download.php" class="nav-link text-white">
                            Downloads <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                
                    <hr>
                    <li>
                        <a href="logout.php" class="btn btn-danger mb-3"> Logout out <i class="fa fa-power-off"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md">
            <div class="pt-4">
               <p><h1 class="fw-bold">Add Questions</h1></p>
                <div class="row">
                    <table class="table">
                        <thead>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Topic</th>
                            <th>Correct Answer</th>
                            <th>Value</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM tests";
                                $statement = $con->prepare($query);
                                $statement->execute();
                                $count = $statement->rowCount();
                                $users = $statement->fetchAll(PDO::FETCH_OBJ);

                                foreach ($users as $user) {
                            ?>
                                <tr>
                                    <td><?= $user->id?>.</td>
                                    <td><?= $user->title?></td>
                                    <td>
                                       <?php
                                            $query = "SELECT * FROM topics WHERE id=:id";
                                            $statement = $con->prepare($query);
                                            $statement->bindValue(':id', $user->topic_id);
                                            $statement->execute();
                                            $count = $statement->rowCount();
                                            $t = $statement->fetch(PDO::FETCH_OBJ);
                                            echo $t->title;
                                       ?>
                                    </td>
                                    <td>
                                       <?= $user->correct?>
                                    </td>
                                    <td>
                                        <?= $user->value?>
                                    </td>
                                    <td><?= $user->created_at?></td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>

                    <p><h1 class="fw-bold">Add Questions</h1></p>

                    <form action="addquestions.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group pt-2">
                            <label for="">Choose Topic</label>
                            <select name="topic_id"  class="form-select">
                                <option value="">Choose</option>
                                <?php   
                                     $query = "SELECT * FROM topics";
                                     $statement = $con->prepare($query);
                                     $statement->execute();
                                     $count = $statement->rowCount();
                                     $topics = $statement->fetchAll(PDO::FETCH_OBJ);

                                     foreach ($topics as $topic) {
                                ?>
                                    <option value="<?= $topic->id?>"><?= $topic->title?></option>
                                <?php
                                     }
                                ?>
                            </select>
                        </div>

                        <div class="form-group pt-2">
                            <label for="">Correct</label>
                            <select name="correct"  class="form-select" required>
                                <option value="">Choose</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group pt-2">
                            <label for="">Value</label>
                            <input type="text" name="value" class="form-control" value="100" required readonly>
                        </div>

                        <div class="form-group pt-3">
                            <button type="submit" class="btn btn-dark btn-lg">Add Question</button>
                        </div>
                        <p></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php

include('footer.php'); 

}
else{
    header('Location: login.php');
}