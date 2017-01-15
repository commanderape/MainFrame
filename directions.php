<?php 
	function getTrafficJson($origin=null, $destination=null){

		$url="https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origin."&destinations=".$destination."&departure_time=now&key=AIzaSyALjTlJ1HEcDOFMNq5ij2k11F2MNiKrHmU";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($ch);    
		curl_close($ch);   

		return json_decode($data , true); 
	}
 
	$json = getTrafficJson("Bad%20Camberg%20Limburger%20Str%2012", "Wiesbaden%20Schwalbacher%20Str.%2038");

	$duration_so = $json["rows"][0]["elements"][0]["duration"]["value"];
	$duration_in_traffic_so = $json["rows"][0]["elements"][0]["duration_in_traffic"]["value"];
	$duration_status_so = ($duration_so*1.15>$duration_in_traffic_so) ? ' good' : ' bad';

	$json = getTrafficJson("Bad%20Camberg%20Limburger%20Str%2012", "Beselich%20Gottlieb-Daimler-Str.%207");

	$duration_bi = $json["rows"][0]["elements"][0]["duration"]["value"];
	$duration_in_traffic_bi = $json["rows"][0]["elements"][0]["duration_in_traffic"]["value"];
	$duration_status_so = ($duration_bi*1.15>$duration_in_traffic_bi) ? 'good' : 'bad';


?>