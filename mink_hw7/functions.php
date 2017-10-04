<?php

function isUserLoggedIn() {
    return !empty($_SESSION['userId']);
}

function logIn($id = null) {
    $id = $id ?? microtime(true);
    $_SESSION['userId'] = (int) $id;
}

function getUserName () {
    if (!isUserLoggedIn()) {
        return '';
    }

    return$_SESSION['userId'];
}

function logOut() {
    $_SESSION['userId'] = null;
}

function recaptcha():bool {
    $secret = '6LdlJzMUAAAAAGfn9SHVIqF4r17-t9B-AJeScADP';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if($responseData->success):
        return true;
    else:
        return false;
    endif;
}