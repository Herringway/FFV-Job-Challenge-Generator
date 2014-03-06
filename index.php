<?php
require_once 'Twig/Autoloader.php';
if (!isset($_GET['trand']))
	srand(ip2long($_SERVER['REMOTE_ADDR']) + isset($_GET['random']) + isset($_GET['advanced']) + isset($_GET['natural']));
$jobs = [];
$jobs['wind'] = ['knight', 'monk', 'thief', 'white mage', 'black mage', 'blue mage'];
$jobs['water'] = ['time mage', 'mystic knight', 'summoner', 'berserker', 'red mage'];
$jobs['fire'] = ['ninja', 'geomancer', 'bard', 'ranger', 'trainer'];
$jobs['earth'] = ['samurai', 'dragoon', 'chemist', 'dancer'];
if (isset($_GET['natural']))
	$characters = ['wind' => 'butz', 'water' => 'lenna', 'fire' => 'faris', 'earth' => 'krile', 'advanced' => 'butz'];
else
	$characters = ['wind' => 'butz', 'water' => 'butz', 'fire' => 'butz', 'earth' => 'butz', 'advanced' => 'butz'];
if (isset($_GET['alsomime']))
	$jobs['water'][] = 'mime';
	
if (isset($_GET['advanced']))
	$jobs['advanced'] = ['oracle', 'cannoneer', 'gladiator'];


if (isset($_GET['magical'])) {
	$jobs['wind'] = array_intersect($jobs['wind'], ['white mage', 'black mage', 'blue mage']);
	$jobs['water'] = array_intersect($jobs['water'], ['time mage', 'summoner', 'red mage']);
	$jobs['fire'] = array_intersect($jobs['fire'], ['bard', 'geomancer']);
	$jobs['earth'] = array_intersect($jobs['earth'], ['chemist', 'dancer']);
	if (isset($jobs['advanced']))
		$jobs['advanced'] = array_intersect($jobs['advanced'], ['oracle']);
}
if (isset($_GET['physical'])) {
	$jobs['wind'] = array_intersect($jobs['wind'], ['knight', 'monk', 'thief']);
	$jobs['water'] = array_intersect($jobs['water'], ['mystic knight', 'berserker']);
	$jobs['fire'] = array_intersect($jobs['fire'], ['ranger', 'trainer', 'ninja']);
	$jobs['earth'] = array_intersect($jobs['earth'], ['samurai', 'dragoon']);
	if (isset($jobs['advanced']))
		$jobs['advanced'] = array_intersect($jobs['advanced'], ['gladiator', 'cannoneer']);
}
	
if (isset($_GET['onejob'])) {
	$selected = $jobs['wind'][array_rand($jobs['wind'])];
	foreach ($jobs as &$joblist)
		$joblist = [$selected];
}
	
$selectedjobs = [];

if (isset($_GET['random'])) {
	$availjobs = [];
	foreach($jobs as $crystal=>$joblist) {
		$availjobs = array_merge($availjobs, $joblist);
		$jobs[$crystal] = $availjobs;
	}
}
if (isset($_GET['BERSERKER']))
	$jobs['water'] = ['berserker'];
foreach ($jobs as $crystal => $j)
	if (count($j) >= 1)
		$selectedjobs[$crystal] = ['character' => $characters[$crystal], 'job' => $j[array_rand($j)]];

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('.');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('ffvjobs.tpl');
$template->display(['jobs' => $selectedjobs]);
?>
