<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>FFV Random Jobs</title>
		<link rel="shortcut icon" href="sprites/butz/knight.png" />
		<style>
		body {background: lightgray;}
		th   {text-align: center; width: 100px; background: white;}
		td   {text-align: center; width: 100px; background: white;}
		</style>
	</head>
	<body>
		<table>
			<tr>{%for crystal,job in jobs%}

				<th>{{crystal|capitalize}}</th>{%endfor%}

			</tr>
			<tr>{%for crystal,job in jobs%}

				<td><img alt="{{job.job|capitalize}}" src="sprites/{{job.character}}/{{job.job|replace({' ':'%20'})}}.png"><br>{{job.job|capitalize}}</td>{%endfor%}

			</tr>
		</table>
	</body>
</html>
