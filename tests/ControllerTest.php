<?php

namespace Bone\Tests;

use Tests\TestCase;

class ControllerTest extends TestCase
{
	/**
	 * A basic test example.
	 *
	 * @test
	 * @dataProvider dataProvider
	 * @return void
	 */
	public function can_post_to_analytics($data, $expects)
	{

		$this->post(route('analytics::fb'), $data)
		     ->assertStatus($expects);

	}

	public function dataProvider()
	{
		return [
			[['email'  => 'test@test.com',
			  'amount' => "65.22"]
			 , 200],

			[['email' => 'test@test.com']
			 , 200],

			[['name'   => 'Billy',
			  'email'  => 'test@test.com',
			  'amount' => "ABC"]
			 , 422],
		];
	}
}
