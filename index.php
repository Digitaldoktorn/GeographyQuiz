<?php

function _e($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}

$whitelist = ['name', '1', '2', '3', '4', '5'];

$errors = [];
$fields = [];
$points = null;
$name = '';

if (!empty($_POST)) {

    // Perform whitelistening
    foreach ($whitelist as $key) {
        $fields[$key] = $_POST[$key];
    }

    // Validate field data
    foreach ($fields as $field => $data) {
        if (empty($data)) {
            $errors[] = 'Fyll i svar för fråga ' . $field;
        }
    }
}

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
                <h1>Frågesport i geografi</h1>
                <br>
                <p>Du får 1 poäng för varje rätt svar och minuspoäng för varje felaktigt svar.</p>
                <?php if (!empty($errors)) : ?>
                    <div class="errors">
                        <p class="bg-danger"><?php echo implode('</p><p class="bg-danger">', $errors); ?></p>
                    </div>
                <?php endif; ?>
                <form role="form" method="post" action="result.php">

                    <div class="form-group">
                        <label for="1" class="control-label">1. Vilken är USA:s huvudstad?</label>
                        <input type="text" class="form-control" id="1" name="1" value="<?php echo isset($fields['1']) ? _e($fields['1']) : '' ?>">
                        <?php if ($_POST['1'] == 'Washington') {
                            $points++;
                        } else {
                            --$points;
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="2" class="control-label">2. Vilken är Brasiliens huvudstad?</label>
                        <input type="text" class="form-control" id="2" name="2" value="<?php echo isset($fields['2']) ? _e($fields['2']) : '' ?>">
                        <?php if ($_POST['2'] == 'Brasilia') {
                            $points++;
                        } else {
                            --$points;
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="3" class="control-label">3. Vilken är Kanadas huvudstad?</label>
                        <input type="text" class="form-control" id="3" name="3" value="<?php echo isset($fields['3']) ? _e($fields['3']) : '' ?>">
                        <?php if ($_POST['3'] == 'Ottawa') {
                            $points++;
                        } else {
                            --$points;
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="4" class="control-label">4. Vilken är Kinas huvudstad?</label>
                        <input type="text" class="form-control" id="4" name="4" value="<?php echo isset($fields['4']) ? _e($fields['4']) : '' ?>">
                        <?php if ($_POST['4'] == 'Beijing' || $_POST['4'] == 'Peking') {
                            $points++;
                        } else {
                            --$points;
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="5" class="control-label">5. Vilken är Australiens huvudstad?</label>
                        <input type="text" class="form-control" id="5" name="5" value="<?php echo isset($fields['5']) ? _e($fields['5']) : '' ?>">
                        <?php if ($_POST['5'] == 'Canberra') {
                            $points++;
                        } else {
                            --$points;
                        } ?>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Namn</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($fields['name']) ? _e($fields['name']) : '' ?>">
                    </div>
                    <div class="form-group">
                        <input id="submit" name="submit" type="submit" value="Skicka" class="btn btn-primary">
                    </div>
                    <?php $name = $fields['name']; ?>
                </form>
            </div>
        </div>
    </div>
</section>

</html>