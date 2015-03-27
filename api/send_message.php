<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET["regId"]) && isset($_GET["message"]) && isset($_GET["title"]) && isset($_GET["tagPush"]) && isset($_GET["time_to_live"])) {
    $regId = $_GET["regId"];
    $tagPush = $_GET["tagPush"];
    $title = $_GET["title"];
    $message = $_GET["message"];
    $time_to_live = $_GET["time_to_live"];


    include_once './GCM.php';

    $gcm = new GCM();

    $registatoin_ids = array($regId);

    $data = array("message" => $message, "title" => $title, "tagPush" => $tagPush);

    $time_to_live = array("time_to_live" =>$time_to_live);

    $result = $gcm->send_notification($registatoin_ids, $message, $title, $tagPush, $time_to_live);

    echo $result;
}
?>
