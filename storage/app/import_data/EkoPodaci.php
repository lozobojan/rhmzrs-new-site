<?php



//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

date_default_timezone_set('Europe/Sarajevo');
header('Content-Type: application/json');

$podaci['EkoPodaci'] = [];
$treuntni_sat = date('YmdH') . "0000";
$prethodni_sat = date('YmdH', strtotime("-1 hour")) . "0000";
$prethodni_sat2 = date('YmdH', strtotime("-1 hour")) . "0000";



// ciscenje fajlova koji nam ne trebaju zadnih 48h

for($i=0; $i<48; $i++) {

	$sat = date('YmdH', strtotime("-{$i} hour")) . "0000";
	$csv_stari = "sumarni_eksterno" . $sat . ".csv";
	$json_stari = "EkoPodaci" . $sat . ".json";
	if(is_file($csv_stari)){
		//echo $csv_stari;
		unlink($csv_stari);


	}

	if(is_file($json_stari)){
		//echo $csv_stari;
		unlink($json_stari);


	}


}




function default_value($var, $default)
{
    return empty($var) ? $default : $var;
}

function generateDecription($StationID, $stationName, $dateTime, $O3, $CO, $SO2, $NO, $NO2, $NOx, $PM10, $PM25)
{

    return "<p>Еко аутоматска станица за мјерење квалитета ваздуха <b>{$stationName}</b></p><p>Термин: {$dateTime}</p><p><a href='http://81.93.72.16/dist/examples/o3.php' target='_blank'>O<sub>3</sub> (Oзон): {$O3} ug/m<sup>3</sup></a></p><p><a href='http://81.93.72.16/dist/examples/CO.php' target='_blank'>CO (Угљен-моноксид):{$CO} mg/m<sup>3</sup></a></p><p><a href='http://81.93.72.16/dist/examples/so2.php' target='_blank'>SO<sub>2</sub> (Сумпор-диоксид): {$SO2} ug/m<sup>3</sup></a></p><p><a href='http://81.93.72.16/dist/examples/no.php' target='_blank'>NO (Азот-моноксид): {$NO} ug/m<sup>3</sup></a></p><p><a href='http://81.93.72.16/dist/examples/no2.php' target='_blank'>NO<sub>2</sub> (Азот-диоксид): {$NO2} ug/m<sup>3</sup></a></p><p><a href='http://81.93.72.16/dist/examples/nox.php' target='_blank'>NOx (Азотни оксиди): {$NOx} ug/m<sup>3</sup></a></p><p><a href='http://81.93.72.16/dist/examples/pm10.php' target='_blank'>PM10 (честице 10 ug): ($PM10) ug/m<sup>3</sup></a></p><p><a href='http://81.93.72.16/dist/examples/pm25.php' target='_blank'>PM25 (честице 2.5 ug):  {$PM25} ug/m<sup>3</sup></a></p>";
}

function createStation(
    $StationID,
    $stationName,
    $lon,
    $lat,
    $alt,
    $dateTime = false,
    $temperatura = 'N/a',
    $vlaznost = 'N/a',
    $pritisak = 'N/a',
    $padavine = 'N/a',
    $brzinaVjetra = 'N/a',
    $smjerVjetra = 'N/a',
    $O3 = 'N/a',
    $CO = 'N/a',
    $SO2 = 'N/a',
    $NO = 'N/a',
    $NO2 = 'N/a',
    $NOx = 'N/a',
    $PM10 = 'N/a',
    $PM25 = 'N/a'
) {


    if (!$dateTime) {
        $dateTime = date('d-M-y H:00:00');
    }

    $stanicaPrazna = [
        "StationID" => default_value($StationID, 'N/a'),
        "StationName" => default_value($stationName, 'N/a'),
        "lon" => default_value($lat, 'N/a'),
        "lat" => default_value($lon, 'N/a'),
        "alt" => default_value($alt, 'N/a'),
        "termin" => default_value($dateTime, 'N/a'),
        "temperatura" => default_value($temperatura, 'N/a'),
        "vlaznost" => default_value($vlaznost, 'N/a'),
        "pritisak" => default_value($pritisak, 'N/a'),
        "suncevoZracenje" => default_value($suncevoZracenje, 'N/a'),
        "padavine" => "0",
        "brzinaVjetra" => default_value($brzinaVjetra, 'N/a'),
        "smjerVjetra" => default_value($smjerVjetra, 'N/a'),
        "O3" => default_value($O3, 'N/a'),
        "CO" => default_value($CO, 'N/a'),
        "SO2" => default_value($SO2, 'N/a'),
        "NO" => default_value($NO, 'N/a'),
        "NO2" => default_value($NO2, 'N/a'),
        "NOx" => default_value($NOx, 'N/a'),
        "PM10" => default_value($PM10, 'N/a'),
        "PM25" => default_value($PM25, 'N/a'),
    ];


    $stanicaPrazna['desc'] = generateDecription($StationID, $stationName, $dateTime, $O3, $CO, $SO2, $NO, $NO2, $NOx,
        $PM10, $PM25);


    return $stanicaPrazna;
}


//perijedor

//echo "EkoPodaci" . $prethodni_sat . ".json";
//die();

@unlink("sumarni_eksterno" . $prethodni_sat2 . ".csv");
@unlink("sumarni_eksterno" . $prethodni_sat . ".csv");
@unlink("sumarni_eksterno" . $prethodni_sat2 . ".csv");
@unlink("sumarni_eksterno" . $prethodni_sat . ".csv");
@unlink("EkoPodaci" . $prethodni_sat2 . ".json");
@unlink("EkoPodaci" . $prethodni_sat . ".json");


    if (!is_file("sumarni_eksterno" . $treuntni_sat . ".csv")) {
        $data = file_get_contents("http://emir:Yh~oQ7f5NEk1@185.141.191.203/lampa/croncomp.php?id={$treuntni_sat}");
        var_dump($data);
        file_put_contents("sumarni_eksterno" . $treuntni_sat . ".csv", $data);
    }



if (is_file("EkoPodaci" . $prethodni_sat . ".json")) {

    //"la";
    //die("brise");
    unlink("EkoPodaci" . $prethodni_sat . ".json");
}

if (is_file("EkoPodaci" . $treuntni_sat . ".json")) {

    echo file_get_contents("EkoPodaci" . $treuntni_sat . ".json");
} else {

    $lines = file("sumarni_eksterno" . $treuntni_sat . ".csv");

    $parsiranoExterni = [];
    foreach ($lines as $line) {
        $data = explode(';', $line);
        $parsiranoExterni[$data[1]][$data[2]] = $data[4];
    }


    if (is_file("ekologija/iox_download_Trebinje.txt")) {
        $lines = file("ekologija/iox_download_Trebinje.txt");

        $k = 0;
        foreach ($lines as $line) {
            if ($k > 4) {
                $data = explode("\t", $line);
                //var_dump($data);
                $parsiranoExterni2["Trebinje"][$data[3]] = $data[6];
            }
            $k++;
        }

    }


    if (is_file("ekologija/iox_download_BLAQMS.txt")) {
        $lines = file("ekologija/iox_download_BLAQMS.txt");

        $k = 0;
        foreach ($lines as $line) {
            if ($k > 4) {
                $data = explode("\t", $line);
				//var_dump($data);

				$parsiranoExterni2["BanjaLuka"][$data[3]] = $data[6];
            }
            $k++;
        }

    }


//var_dump($parsiranoExterni2);

//die();


    $prijedorData = json_decode(file_get_contents("EkoPodaci.json"));


	if(isset($prijedorData->EkoPodaci['0']) )
		array_push($podaci['EkoPodaci'], $prijedorData->EkoPodaci['0']);

    //Banja Luka


    array_push($podaci['EkoPodaci'], createStation("BanjaLuka", "Бања Лука", "44.79804", "17.20496", "163", false,


        $parsiranoExterni2['BanjaLuka']['Temp'],
        $parsiranoExterni2['BanjaLuka']['ReVl'],
        $parsiranoExterni2['BanjaLuka']['AtPr'],
        'N/a',
        $parsiranoExterni2['BanjaLuka']['BrVj'],
        $parsiranoExterni2['BanjaLuka']['SmVj'],
        $parsiranoExterni2['BanjaLuka']['O3'],
        $parsiranoExterni2['BanjaLuka']['CO'],
        $parsiranoExterni2['BanjaLuka']['SO2'],
        $parsiranoExterni2['BanjaLuka']['NO'],
        $parsiranoExterni2['BanjaLuka']['NO2'],
        $parsiranoExterni2['BanjaLuka']['NOx'],
        $parsiranoExterni2['BanjaLuka']['PM10'],
        $parsiranoExterni2['BanjaLuka']['PM2.5']

    ));

    //Trebinje


    array_push($podaci['EkoPodaci'], createStation("Trebinje", "Требиње", "42.71408", "18.33418", "275", false,


        $parsiranoExterni2['Trebinje']['Temp'],
        $parsiranoExterni2['Trebinje']['ReVl'],
        $parsiranoExterni2['Trebinje']['AtPr'],

        'N/a',
        $parsiranoExterni2['Trebinje']['BrVj'],
        $parsiranoExterni2['Trebinje']['SmVj'],
        $parsiranoExterni2['Trebinje']['O3'],
        $parsiranoExterni2['Trebinje']['CO'],
        $parsiranoExterni2['Trebinje']['SO2'],
        $parsiranoExterni2['Trebinje']['NO'],
        $parsiranoExterni2['Trebinje']['NO2'],
        $parsiranoExterni2['Trebinje']['NOx'],
        $parsiranoExterni2['Trebinje']['PM10'],
        $parsiranoExterni2['Trebinje']['PM2.5']

    ));

    //Doboj


    array_push($podaci['EkoPodaci'], createStation("Doboj", "Добој", "44.72629", "18.08894", "143"

    ));


    //Gacko


    array_push($podaci['EkoPodaci'], createStation("Gacko", "Гацко", "43.16458", "18.535791", "940", false,


        $parsiranoExterni['Gacko']['Temp'],
        $parsiranoExterni['Gacko']['RelVl'],
        $parsiranoExterni['Gacko']['AtPr'],

        'N/a',
        $parsiranoExterni['Gacko']['BrVj'],
        $parsiranoExterni['Gacko']['SmVj'],
        $parsiranoExterni['Gacko']['O3'],
        $parsiranoExterni['Gacko']['CO'],
        $parsiranoExterni['Gacko']['SO2'],
        $parsiranoExterni['Gacko']['NO'],
        $parsiranoExterni['Gacko']['NO2'],
        $parsiranoExterni['Gacko']['NOx'],
        $parsiranoExterni['Gacko']['PM10'],
        $parsiranoExterni['Gacko']['PM25']

    ));


    //Uglevik


    array_push($podaci['EkoPodaci'], createStation("Ugljevik", "Угљевик", "44.684038", "18.969576", "258", false,


        $parsiranoExterni['Ugljevik']['Temp'],
        $parsiranoExterni['Ugljevik']['RelVl'],
        $parsiranoExterni['Ugljevik']['AtPr'],

        'N/a',
        $parsiranoExterni['Ugljevik']['BrVj'],
        $parsiranoExterni['Ugljevik']['SmVj'],
        $parsiranoExterni['Ugljevik']['O3'],
        $parsiranoExterni['Ugljevik']['CO'],
        $parsiranoExterni['Ugljevik']['SO2'],
        $parsiranoExterni['Ugljevik']['NO'],
        $parsiranoExterni['Ugljevik']['NO2'],
        $parsiranoExterni['Ugljevik']['NOx'],
        $parsiranoExterni['Ugljevik']['PM10'],
        $parsiranoExterni['Ugljevik']['PM25']
    ));


    //Brod


    array_push($podaci['EkoPodaci'], createStation("Brod", "Брод", "45.128773", "17.984008", "84", false,


        $parsiranoExterni['Brod']['Temp'],
        $parsiranoExterni['Brod']['RelVl'],
        $parsiranoExterni['Brod']['AtPr'],

        'N/a',
        $parsiranoExterni['Brod']['BrVj'],
        $parsiranoExterni['Brod']['SmVj'],
        $parsiranoExterni['Brod']['O3'],
        $parsiranoExterni['Brod']['CO'],
        $parsiranoExterni['Brod']['SO2'],
        $parsiranoExterni['Brod']['NO'],
        $parsiranoExterni['Brod']['NO2'],
        $parsiranoExterni['Brod']['NOx'],
        $parsiranoExterni['Brod']['PM10'],
        $parsiranoExterni['Brod']['PM25']

    ));


    $podaci = json_encode($podaci);


    file_put_contents("EkoPodaci" . $treuntni_sat . ".json", $podaci);

    echo $podaci;

}
