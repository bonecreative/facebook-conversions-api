<?php

namespace BoneCreative\FacebookConversionsApi;

use GuzzleHttp\Client as Guzzle;

abstract class Client
{

	public static function purchase($email, $amount){
		$data = json_encode([
			                    "event_name"    => "Purchase",
			                    "event_time"    => time(),
			                    "action_source" => "website",

			                    "user_data" => [
				                    "em" => [hash('sha256', $email)],
				                    "ph" => [null],
			                    ],

			                    "custom_data" => [
				                    "currency" => config(ServiceProvider::SHORT_NAME .'.currency'),
				                    "value"    => $amount,
			                    ],
		                    ]);

		return self::send($data);
	}

	public static function initiateCheckout($email)
	{
		$data = json_encode([
			                    "event_name"    => "InitiateCheckout",
			                    "event_time"    => time(),
			                    "action_source" => "website",

			                    "user_data" => [
				                    "em" => [hash('sha256', $email)],
				                    "ph" => [null],
			                    ]
		                    ]);

		return self::send($data);
	}

	private static function send($data)
	{

		$config = config(ServiceProvider::SHORT_NAME);
		$search = array_keys(array_change_key_case($config, CASE_UPPER));
		foreach($search as &$i)
		{
			$i = '{' . $i . '}';
		}
		$replace = array_values($config);

		$url = str_replace($search, $replace, 'https://graph.facebook.com/v13.0/{PIXEL_ID}/events?access_token={TOKEN}');

		if(env('APP_ENV') != 'production')
		{
			$url .= '&test_event_code='. config(ServiceProvider::SHORT_NAME .'.test_id');
		}

		$client   = new Guzzle();
		$response = $client->request('POST', $url, ['form_params' => ['data' => [$data]]]);

		return ($response->getStatusCode() == 200)
			? true
			: false;
	}

}
