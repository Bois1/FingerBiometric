<?php
/*
 * Author: Babatunde Odunaiya
 * Date: 1-August-2023 5:07 AM
 * About: I am boring
 */
require_once("../coreComponents/basicRequirements.php");

if(!empty($_POST["data"])) {
    $user_data = json_decode($_POST["data"]);
    $pre_enrolled_finger_data = $user_data->pre_enrolled_finger_data;

    $enrolled_index_finger_data = $user_data->enrolled_index_finger_data;
    $enrolled_middle_finger_data = $user_data->enrolled_middle_finger_data;

    $verified_index_finger = verify_fingerprint($pre_enrolled_finger_data, $enrolled_index_finger_data);
    $verified_middle_finger = verify_fingerprint($pre_enrolled_finger_data, $enrolled_middle_finger_data);

    if ($verified_index_finger !== "verification failed" && $verified_index_finger){
        echo json_encode("match");
    }
    elseif ($verified_middle_finger !== "verification failed" && $verified_middle_finger){
        echo json_encode("match");
    }
    else {
        echo json_encode("no_match");
    }

}
else {
    echo json_encode("error! no data provided in post request");
}
