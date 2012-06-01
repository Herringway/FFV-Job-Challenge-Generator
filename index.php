<?php
require_once 'Dwoo/dwooAutoload.php';
$dwoo = new Dwoo();
$jobs = array();
$jobs[] = array('Knight', 'Monk', 'Thief', 'White Mage', 'Black Mage', 'Blue Mage');
$jobs[] = array('Time Mage', 'Mystic Knight', 'Summoner', 'Berserker', 'Red Mage', 'Mime');
$jobs[] = array('Ninja', 'Geomancer', 'Bard', 'Ranger', 'Trainer');
$jobs[] = array('Samurai', 'Dragoon', 'Chemist', 'Dancer');
$characters = array('butz', 'lenna', 'faris', 'krile');
if (!isset($_GET['trand']))
	srand(ip2long($_SERVER['REMOTE_ADDR']) + isset($_GET['superhard']));
	
if (isset($_GET['hard'])) {
	for($i = 1; $i < 4; $i++)
		$jobs[$i] = array_merge($jobs[$i], $jobs[$i-1]);

	foreach ($jobs as $j)
		$selectedjobs[] = array('character' => 'butz', 'job' => $j[rand(0,count($j)-1)]);
} else if (isset($_GET['superhard'])) {
	foreach ($jobs as $i => $j)
		$selectedjobs[] = array('character' => $characters[$i], 'job' => $j[rand(0,count($j)-1)]);
} else {
	if (isset($_GET['advancemode']))
		$jobs[] = array('Oracle', 'Cannoneer', 'Gladiator');

	$selectedjobs = array();
	foreach ($jobs as $j)
		$selectedjobs[] = array('character' => 'butz', 'job' => $j[rand(0,count($j)-1)]);
}
$dwoo->output('ffvjobs.tpl', array('jobs' => $selectedjobs));
?>
