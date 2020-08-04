<?php
include('index.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Frågesport i geografi</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Custom Styles -->
    <style>
        .errors p,
        .success p {
            padding: 15px;
        }
    </style>
</head>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Resultat:</h3>
                <p>Grattis <?php echo $name; ?>, du fick <?php echo $points; ?> poäng!</p>
            </div>
        </div>
    </div>
</section>

</html>