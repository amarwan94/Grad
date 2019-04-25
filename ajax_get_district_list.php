<?php

require_once './Artifex.php';
$connection = Artifex::getInstance();
$city = $_GET['city'];
/* @var $connection Artifex */
$id = $connection->find_one("city", "name", $city)['id'];
$districtList = $connection->find('district', 'city_id',$id);
echo '<option value="" disabled selected>Select your District</option>';
while($district = $districtList->fetch_assoc()) {
    echo "<option value='".$district['name']."'>".$district['name']."</option>";
}

