<?php
namespace App\Libraries;

/**
 * Libaries Static Ijin
 */
class Helper {

	// Main menu Data
	public static function callbackFormatResponse($data, $error, $message) {

		$res = [
			"data" => $data,
			"error" => $error,
			"message" => $message
		];

		return $res;
	}


	public static function apiCallback($response) {

		if (!$response) {
			$data = '';
			$error = 1;
			$message = "error";
		} else {
			$data =  $response;
			$error = 0;
			$message = "success";
		}

		$res = [
			"data" => $data,
			"error" => $error,
			"message" => $message
		];

	 	// return $res;
	 	return response()->json($res);
	}

	public static  function formatRupiah($value)
	{
		return 'Rp '.strrev(implode('.',str_split(strrev(strval($value)),3)));
	}

	public static function removeDash($value)
	{
		return  str_replace(["-", "–"], ' ', $value);
	}

	public static function formattedDate($date)
	{
		return \Carbon\Carbon::parse($date)->format('d F Y');
	}

	/**
	 * Formated 0 to 62
	 */
	public static function waPhoneFormatted($value)
	{
		return '62'.substr(trim($value), 1);
	}

	/**
	 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
	 * @param str $hex Colour as hexadecimal (with or without hash);
	 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
	 * @return str Lightened/Darkend colour as hexadecimal (with hash);
	 * https://gist.github.com/stephenharris/5532899
	*/
	public static function color_luminance( $hex, $percent ) {

		// validate hex string

		$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
		$new_hex = '#';

		if ( strlen( $hex ) < 6 ) {
			$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
		}

		// convert to decimal and change luminosity
		for ($i = 0; $i < 3; $i++) {
			$dec = hexdec( substr( $hex, $i*2, 2 ) );
			$dec = min( max( 0, $dec + $dec * $percent ), 255 );
			$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
		}

		return $new_hex;
	}

	/**
	 * https://jaspreetchahal.org/how-to-lighten-or-darken-hex-or-rgb-color-in-php-and-javascript/
	 */
	public static function adjustColorLightenDarken($color_code,$percentage_adjuster = 0) {
		$percentage_adjuster = round($percentage_adjuster/100,2);
		if(is_array($color_code)) {
			$r = $color_code["r"] - (round($color_code["r"])*$percentage_adjuster);
			$g = $color_code["g"] - (round($color_code["g"])*$percentage_adjuster);
			$b = $color_code["b"] - (round($color_code["b"])*$percentage_adjuster);

			return array("r"=> round(max(0,min(255,$r))),
				"g"=> round(max(0,min(255,$g))),
				"b"=> round(max(0,min(255,$b))));
		}
		else if(preg_match("/#/",$color_code)) {
			$hex = str_replace("#","",$color_code);
			$r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
			$g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
			$b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
			$r = round($r - ($r*$percentage_adjuster));
			$g = round($g - ($g*$percentage_adjuster));
			$b = round($b - ($b*$percentage_adjuster));

			return "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
				.str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
				.str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);

		}
	}

	public static function thisYear() {

		return date("Y");
	}

	// Version File
	public static function version($path)
	{
		return asset($path) . '?ver=' . filesize($path);
	}

}
