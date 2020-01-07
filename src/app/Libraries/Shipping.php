<?php
namespace App\Libraries;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
// use GuzzleHttp\Psr7\Request;
/**
 * Libaries Static Ijin
 */
class Shipping {

	public static function curlHttp($method = 'get', $endpoint, $key)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $endpoint,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			// CURLOPT_POSTFIELDS => json_encode($data2),
			CURLOPT_HTTPHEADER => array(
				// Set here requred headers
				"accept: */*",
				"accept-language: en-US,en;q=0.8",
				"content-type: application/json",
				"key:".$key,
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			// echo "cURL Error #:" . $err;
			return $err;
		} else {
			// print_r(json_decode($response));
			return $response;
		}
	}

	public static function getCityData()
	{

		$endpoint_url = env('API_RAJA_ONGKIR') . '/city';
		$key = env('KEY_RAJA_ONGKIR');

		// \Log::info('shipping curl: '. $endpoint_url.', '.$key);

		$client = new Client();
		$res = $client->request('GET', $endpoint_url, [
			'headers' => [
				'key' => $key,
			]
		]);

		if ( $res->getStatusCode() == 200 ) {
			$stream = $res->getBody();
			$response_content = $stream->getContents();
			$response_json = json_decode($response_content);

			$data = $response_json->rajaongkir->results;
			$error = $response_json->rajaongkir->status->code;
			$message = $response_json->rajaongkir->status->description;

		} else {
			$data = '';
			$error = $response_json->rajaongkir->status->code;
			$message = $response_json->rajaongkir->status->description;
		}

		$response = [
			"data" => $data,
			"error" => $error,
			"message" => $message,
		];


		return $response;
	}

	public static function getCost($form_data)
	{

		$endpoint_url = env('API_RAJA_ONGKIR') . '/cost';
		$client = new Client();
		// $client = new \GuzzleHttp\Client();
		$res = $client->request('POST', $endpoint_url, [
			'form_params' => $form_data,
			'headers' => [
				'key' => env('KEY_RAJA_ONGKIR'),
			]
		]);

		if ( $res->getStatusCode() == 200 ) {
			$stream = $res->getBody();
			$response_content = $stream->getContents();
			$response_json = json_decode($response_content);

			$data = $response_json->rajaongkir->results;
			$error = $response_json->rajaongkir->status->code;
			$message = $response_json->rajaongkir->status->description;

		} else {
			$data = '';
			$error = $response_json->rajaongkir->status->code;
			$message = $response_json->rajaongkir->status->description;
		}

		$response = [
			"data" => $data,
			"error" => $error,
			"message" => $message,
		];


		return $response;
	}




}
