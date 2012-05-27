<?php
require_once 'Dwoo/dwooAutoload.php';
$dwoo = new Dwoo();
$jobs = array();
$jobs[] = array('Knight', 'Monk', 'Thief', 'White Mage', 'Black Mage', 'Blue Mage');
$jobs[] = array('Time Mage', 'Magic Knight', 'Summoner', 'Berserker', 'Red Mage', 'Mime');
$jobs[] = array('Ninja', 'Elementalist', 'Bard', 'Ranger', 'Trainer');
$jobs[] = array('Samurai', 'Dragoon', 'Chemist', 'Dancer');

if (isset($_GET['advancemode']))
	$jobs[] = array('Oracle', 'Cannoneer', 'Gladiator');

if (!isset($_GET['trand']))
	srand(ip2long($_SERVER['REMOTE_ADDR']));
	
$selectedjobs = array();
foreach ($jobs as $j)
	$selectedjobs[] = array('job' => $j[rand(0,count($j)-1)]);

$dwoo->output('ffvjobs.tpl', array('jobs' => $selectedjobs));
?>
