<?php

function _e($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}

$whitelist = ['first_name', 'last_name', 'email'];
$email_address = 'ae.swe@protonmail.com';
$subject = 'Svar på frågesport';

$errors = [];
$fields = [];

if (!empty($_POST)) {
    print_r($_POST);

    // Validate email
    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Det är ingen giltig epostadress';
    }

    // Perform whitelistening
    foreach ($whitelist as $key) {
        $fields[$key] = $_POST[$key];
    }

    // Validate field data
    foreach ($fields as $field => $data) {
        if (empty($data)) {
            $errors[] = 'Skriv in ditt ' . $field;
        }
    }

    // Check and progress
    if (empty($errors)) {
        $sent = mail($email_address, $subject, $field['message']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frågesport i geografi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Frågesport i geografi</h1>
        </header>
        <main>
            <?php if (!empty($errors)) : ?>
                <div>
                    <p><?php echo implode('</p><p>', $errors); ?></p>
                </div>

            <?php elseif ($sent) : ?>
                <div>
                    <p>Ditt meddelande är skickat. Tack!</p>
                </div>
            <?php endif; ?>

            <form method="post" action="index.php">
                <label for="q1">Vilken är Kanadas huvudstad?</label>
                <input name="q1" type="text">
                <label for="q2">Vilken är Australiens huvudstad?</label>
                <input name="q2" type="text">
                <label for="q3">Vilken är Kinas huvudstad?</label>
                <input name="q3" type="text">
                <label for="q4">Vilken är USA:s huvudstad?</label>
                <input name="q4" type="text">
                <label for="q5">Vilken är Brasiliens huvudstad?</label>
                <input name="q5" type="text">
                <label for="q6">Vad är gemensamt för dessa städer?</label>
                <p name="q6">
                    <label>
                        <input name="group1" type="radio" />
                        <span>De ligger alla i den östra delen i respektive land</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="group1" type="radio" />
                        <span>De är inte den största staden i respektive land</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="group1" type="radio" />
                        <span>De blev alla huvudstäder under 1900-talet</span>
                    </label>
                </p>
                <p>
                    <br>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" value="<?php echo isset($fields['first_name']) ? _e($fields['first_name']) : '' ?>">
                            <label for="first_name">Förnamn</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" value="<?php echo isset($fields['last_name']) ? _e($fields['last_name']) : '' ?>">
                            <label for="last_name">Efternamn</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" value="<?php echo isset($fields['email']) ? _e($fields['email']) : '' ?>">
                            <label for="email">Epost</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Skicka
                    </button>
                    <br>
                    <br>
            </form>
        </main>
        <footer>
        </footer>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>