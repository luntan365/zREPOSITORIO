<?php
// ==================================RECOMENDADO=============================================

$load = sys_getloadavg();
if ($load[0] > 20) {
    header('HTTP/1.1 503 Too busy, try again later');
    die('Server too busy. Please try again later.');
}

// ==================================OU=============================================

if (!isset($_SESSION)) {
        session_start();
}
// anti flood protection
if($_SESSION['last_session_request'] < time() - 2){
        // users will be redirected to this page if it makes requests faster than 2 seconds
        header("location: http://www.example.com/403.html");
        exit;
}
$_SESSION['last_session_request'] = time();


// ==================================OU=============================================

if(empty($_SESSION['AFsys_time']) || $_SESSION['AFsys_time'] == '0') {
    $tGoal = time() + 3; // Pluss Seconds
    $_SESSION['AFsys_time'] = $tGoal;
}

if(empty($_SESSION['AFsys_pReloads']) || $_SESSION['AFsys_pReloads'] == 0 ) { $_SESSION['AFsys_pReloads'] = 1; } else { $_SESSION['AFsys_pReloads']++; };

if($_SESSION['AFsys_time'] < time()){
    $_SESSION['AFsys_time'] = 0; // Session Reset
    $_SESSION['AFsys_pReloads'] = 0; // Session Reset
}

if($_SESSION['AFsys_pReloads'] > '5' && $_SESSION['AFsys_time'] > time()){
    $_SESSION['AFsys_time'] = 0; // Session Reset
    $_SESSION['AFsys_pReloads'] = 0; // Session Reset
    header("location: http://www.example.com/403.html");
    exit;
}
