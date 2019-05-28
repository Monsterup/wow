<?php

$curl = curl_init();

$api = file_get_contents("https://randomuser.me/api");

@$results = $_GET['results'];
@$gender = $_GET['gender'];
$num = 1;

if(($results)&&(!$gender)) {
    $api = file_get_contents("https://randomuser.me/api?results=$results");
} else if(($gender)&&(!$results)) {
    $api = file_get_contents("https://randomuser.me/api?results=10&gender=$gender");
} else if (($results)&&($gender)) {
    $api = file_get_contents("https://randomuser.me/api?results=$results" . "&" . "gender=$gender");
}

$user = json_decode($api);
?>

<br>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Picture</th>
                <th scope="col">Full Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <?php foreach($user->results as $p) { ?>
            <tr>
                <th scope="row"><?=$num++ ?></th>
                <td>
                    <img src="<?=$p->picture->large ?>" >                
                </td>
                <td><?=$p->name->title ?> <?=$p->name->first ?> <?=$p->name->last ?></td>
                <td><?=$p->location->street ?> <?=$p->location->city ?></td>
                <td><?=$p->email ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<br>
