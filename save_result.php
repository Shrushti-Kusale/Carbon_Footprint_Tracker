<?php
include "db.php";

/* ------------------ INPUTS ------------------ */

/* Electricity */
$ac = $_POST['ac'];
$fan = $_POST['fan'];
$geyser = $_POST['geyser'];

/* Travel */
$vehicles = $_POST['vehicle'] ?? [];
$travelTime = $_POST['travel'];
$travelDays = $_POST['travel_days'];
$wfh = $_POST['wfh'];

/* Waste */
$waste = $_POST['waste'];
$recycle = $_POST['recycle'];
$compost = $_POST['compost'];

/* Food */
$diet = $_POST['diet'];
$food = $_POST['food'];

/* Shopping */
$clothes = $_POST['clothes'];
$shopping = $_POST['shopping'];
$plastic = $_POST['plastic'];

/* ------------------ EMISSION FACTORS ------------------ */

$vehicleFactor = [
    "car" => 0.21,
    "carpool" => 0.12,
    "bike" => 0.1,
    "bus" => 0.05,
    "train" => 0.04,
    "auto" => 0.15,
    "cycle" => 0
];

/* ------------------ CALCULATIONS ------------------ */

/* Electricity emission */
$electricity =
    ($ac * 0.8) +
    ($fan * 0.05) +
    ($geyser * 0.5) +
    ($fridge * 0.4) +
    ($washing * 0.6);

/* Travel emission */
$transport = 0;

foreach($vehicles as $vehicle){
    if(isset($vehicleFactor[$vehicle])){
        $transport += $travelTime * $vehicleFactor[$vehicle];
    }
}

/* Weekly adjustment */
$effectiveTravelDays = max(0, $travelDays - $wfh);

/* Convert to daily average */
$transport = ($transport * $effectiveTravelDays) / 7;

/* Waste emission */
$wasteEmission =
    $waste +
    $recycle +
    $compost;

/* Food emission */
$foodEmission =
    $diet +
    $food;

/* Shopping emission */
$shoppingEmission =
    $clothes +
    $shopping +
    $plastic;

/* Total footprint */
$total =
    $electricity +
    $transport +
    $wasteEmission +
    $foodEmission +
    $shoppingEmission;

/* ------------------ SAVE RESULT ------------------ */

$conn->query("INSERT INTO history(user_id,footprint)
VALUES(".$_SESSION['user']['id'].",$total)");

/* Store result for result page */
$_SESSION['last_result'] = round($total,2);

/* Redirect to result page */
header("location:result.php");
exit();
?>
