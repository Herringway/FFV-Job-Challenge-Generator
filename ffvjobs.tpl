<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>FF5 Random Jobs</title>
		<link rel="shortcut icon" href="http://peng.elpenguino.net/ffvsprites/knight.PNG" />
	</head>
	<body style="background: lightgray;">
		<table><tr>{loop $jobs}<td style="text-align: center; width: 100px; background: white;"><img alt="{$job}" src="ffvsprites/{replace($job, ' ', '%20')|lower}.PNG"><br>{$job}</td>{/loop}</tr></table>
	</body>
</html>