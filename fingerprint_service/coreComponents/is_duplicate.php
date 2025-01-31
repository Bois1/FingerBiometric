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

    // each enrolled hand has two fingers (index and middle finger)
    // in reality this could be any finger, we just expect two fingers
    // for each hand
    $enrolled_hands_list = $user_data->enrolled_hands_list;
    $is_duplicate = check_duplicate($pre_enrolled_finger_data, $enrolled_hands_list);
    if ($is_duplicate){
        echo json_encode(true);
    }
    else{
        echo json_encode(false);
    }
}
else {
    echo json_encode("error! no data provided in post request");
}
