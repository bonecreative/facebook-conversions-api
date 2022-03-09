<?php

namespace Bone\Tests;

use BoneCreative\FacebookConversionsApi\Client;
use BoneCreative\FacebookConversionsApi\ServiceProvider;
use Tests\TestCase;

class ClientTest extends TestCase
{

	protected $client;

	/*public function setUp()
	{
		parent::setUp();

		//$this->client = $this->app->make(Client::class);
	}*/

	/**
	 * @see \BoneCreative\CheckFront\Client::__call
	 *
	 * @test
	 */
	public function can_test()
	{

		$t = time();

		$client   = new \GuzzleHttp\Client();
		$response = $client->request(
			'POST',
		                             'https://graph.facebook.com/v13.0/1422370724725387/events?test_event_code=TEST8912&access_token=EAAD5a08hxzIBAOU7xP6O0o0b6caMMVvUF9nr1cufpMgbke37LBjHxSZC67PTN5o38ucCgRLGX1ytvmXErmnk5rdww5qob1izgXqvbyU99LDXSb0A5ZAZAYMZC2dLejjlZAA2y5q59nIFcZBdadZC8v0SIDxRfw5uvOjNE1RCHuiOaRpWKWkQz4nFieJeNCjSfIZD'
			, ['form_params' => [

			'data' => '
       [{
          "event_name": "InitiateCheckout",
             "event_time": '. $t .',
             "action_source": "website",
             "user_data": {
          "em": [
            null
          ],
                 "ph": [
            null
          ]
           },
         "custom_data": {
          "currency": "USD",
           "value": "99.53"
         }
       }]
     '
		]]);
	}
}