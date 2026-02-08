<?php
include "db.php";

/* Calculator type */
$type=$_POST['calc_type'] ?? 'individual';

/* Vehicle emission factors */
$vehicleFactor=[
    "car"=>0.21,
    "bike"=>0.1,
    "bus"=>0.05,
    "train"=>0.04 ];

$total=0;

/* ==============================
   INDIVIDUAL CALCULATION
============================== */
if($type=="individual"){

    $ac=$_POST['ac'];
    $fan=$_POST['fan'];
    $geyser=$_POST['geyser'];

    $vehicles=$_POST['vehicle'] ?? [];
    $travelTime=$_POST['travel'];

    $waste=$_POST['waste'];
    $recycle=$_POST['recycle'];
    $diet=$_POST['diet'];
    $food=$_POST['food'];
    $shopping=$_POST['shopping'];
    $plastic=$_POST['plastic'];

    /* Electricity */
    $electricity=
        ($ac*0.8)+
        ($fan*0.05)+
        ($geyser*0.5);

    /* Travel */
    $transport=0;
    foreach($vehicles as $vehicle){
        if(isset($vehicleFactor[$vehicle])){
            $transport+=$travelTime*
                        $vehicleFactor[$vehicle]; }}

    /* Waste */
    $wasteEmission=$waste+$recycle;

    /* Lifestyle */
    $lifestyle=$diet+$food+
               $shopping+$plastic;

    $total=
        $electricity+
        $transport+
        $wasteEmission+
        $lifestyle; }

/* ==============================
   HOUSEHOLD CALCULATION
============================== */
else if($type=="household"){

    $members=$_POST['members'];
    $ac_units=$_POST['ac_units'];
    $fridge=$_POST['fridge'];
    $washing=$_POST['washing'];
    $vehicles=$_POST['vehicles'];
    $fuel=$_POST['fuel'];
    $cooking=$_POST['cooking'];
    $houseWaste=$_POST['house_waste'];
    $segregation=$_POST['segregation'];
    $solar=$_POST['solar'];
    $home_size=$_POST['home_size'];

    /* Electricity */
    $electricity=
        ($ac_units*5)+
        ($fridge*2)+
        ($washing*2)+
        ($home_size*2);

    /* Transport */
    $transport=$vehicles*$fuel;

    /* Cooking */
    $cookingEmission=$cooking;

    /* Waste */
    $wasteEmission=
        $houseWaste+$segregation;

    /* Household total */
    $houseTotal=
        $electricity+
        $transport+
        $cookingEmission+
        $wasteEmission+
        $solar;

    /* Per person */
    $total=$houseTotal/max(1,$members); }

/* ==============================
   SAVE RESULT
============================== */

$conn->query("INSERT INTO history(user_id,footprint,calc_type)
VALUES(".$_SESSION['user']['id'].",$total,'$type')");

/* Store result */
$_SESSION['last_result']=round($total,2);

/* Redirect */
header("location:result.php");
exit(); ?>
