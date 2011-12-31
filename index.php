<?php
require_once 'Dwoo/dwooAutoload.php';
$dwoo = new Dwoo();
$jobs = array();
$jobs[] = array('Knight', 'Monk', 'Thief', 'White Mage', 'Black Mage', 'Blue Mage');
$jobs[] = array('Time Mage', 'Magic Knight', 'Summoner', 'Berserker', 'Red Mage', 'Mime');
$jobs[] = array('Ninja', 'Elementalist', 'Bard', 'Ranger', 'Trainer');
$jobs[] = array('Samurai', 'Dragoon', 'Chemist', 'Dancer');

if (array_key_exists('advancemode', $_GET))
	$jobs[] = array('Oracle', 'Cannoneer', 'Gladiator');

$selectedjobs = array();
foreach ($jobs as $j)
	$selectedjobs[] = array('job' => $j[rand(0,count($j)-1)]);

$dwoo->output('ffvjobs.tpl', array('jobs' => $selectedjobs));
?>
