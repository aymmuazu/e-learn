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
                    <h1>Dashboard</h1>
                    <?=$name?><br>
                    <?=$email?><br><?=$created_at?></p>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="pt-2">
                        <a href="/home.php" class="nav-link active text-white">
                            Dashboard <span class="fa fa-home"></span>
                        </a>
                    </li>

                    <li class="pt-2">
                        <a href="topics.php" class="nav-link text-white">
                            Topics <span class="fab fa-cc-mastercard"></span>
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
               <div class="row pt-4">
                <div class="col-md">
                    <div class="card text-dark border-dark mb-3">
                        <div class="card-body">
                            <?php
                                $i = 1;
                                $query = "SELECT * FROM tests WHERE topic_id=:id";
                                $statement = $con->prepare($query);
                                $statement->bindValue(':id', $_GET['topic_id']);
                                $statement->execute();
                                $fetch = $statement->fetchAll(PDO::FETCH_OBJ);
                                $p = 1;
                                $g = 1;
                            ?>

                            <form action="result.php" method="post">
                                <h3 class="fw-bold">Read the Questions Carefully and Answer Them:</h3>
                                <?php
                                    foreach ($fetch as $value) {
                                ?>
                                    <?= $i++?>. <?= $value->title?>
                                    <input type="radio" name="q<?=$p++?>" value="Yes"> Yes 
                                    <input type="radio" name="q<?=$g++?>" value="No"> No 
                                    <p></p>
                                <?php
                                    }
                                ?>

                                <button type="submit" class="btn btn-dark">Submit Test</button>
                            </form>

                        </div>
                    </div>  
                </div>
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