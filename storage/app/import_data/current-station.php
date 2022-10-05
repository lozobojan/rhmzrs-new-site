<?php

if ($_GET['location'])
{
	$currentMeteoDataByCity = file_get_contents('currentmeteodata.json');

	$locationId = (int) $_GET['location'];
	$currentMeteoDataByCityArray = json_decode($currentMeteoDataByCity, true);
	$tempArra = [];

	foreach ($currentMeteoDataByCityArray["MeteoPodaci"] as $station)
	{
		if ((int) $station["StationID"] === $locationId)
		{
			array_push($tempArra, $station);
		}
	}

	echo empty($tempArra) ? json_encode(['message' => 'Нема података за ову станицу']) : json_encode(current($tempArra));
}

?>
