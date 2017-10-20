<?php

if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && isset($_POST['submit'])) {
    $nick = $_POST['inputNick'] ?? '';
    $message = $_POST['inputMessage'] ?? '';
    $response = [
        'success' => false,
        'param_microtime' => null,
        'messages' => [],
        'errors' => [],
    ];
    $errors = [];
    if (!$nick) {
        $errors['inputNick'] = 'empty nick';
    }
    if (!$message) {
        $errors['inputMessage'] = 'empty message';
    }
    if (empty($errors)) {
        $file = fopen('./messages.csv', 'a+');
        $msg = [microtime(true), $nick, $message];
        fputcsv($file, $msg);
        fclose($file);
        $response['success'] = true;
        $response['param_microtime'] = microtime(true);
        $file = fopen('./messages.csv', 'r');
        if ($file !== FALSE) {
            $data = [];
            $result = [];
            while ($data !== FALSE) {
                $data = fgetcsv($file);
                array_push($result, $data);
            }
            for ($i = 0; $i < count($result) - 1; $i++) {
                $currentMessage = [
                    'login' => $result[$i][1],
                    'datetime' => date('d-m-y H:i:s', $result[$i][0]),
                    'message' => $result[$i][2],
                ];
                array_push($response['messages'], $currentMessage);
            }
            fclose($file);
        }
    } else {
        $response['errors'] = $errors;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {

}