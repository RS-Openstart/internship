<?php

function tel_validation(string $tel) {
    $pattern = '/^(8|\+?7)[ ]*[-]?\(?\d{3}\)?([ ]*[-]?[ ]*\d{1}){7}$/';
    return preg_match($pattern, $tel);
}

function popup_msg(string $msg) {
    echo $msg . '<br>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['tel'])) {
        popup_msg('Error');
    }
    else {
        $tel = trim($_POST['tel']);
        if (tel_validation($tel)) {
            popup_msg('Phone is valid');
        }
        else {
            popup_msg('Phone is invalid');
        }
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phone validation</title>
</head>
<body>
    <form action='<?= $_SERVER['PHP_SELF']; ?>' method='POST'>
        <div>
            <label>
                <span>Phone:</span>
                <input type='tel' name="tel" value="<?= empty($_POST['tel']) ? '' : $_POST['tel']; ?>" required autocomplete='off'>
            </label>
        </div>
        <div>
            <button>Check</button>
        </div>
    </form>
</body>
</html>