<?php

namespace BoneCreative\FacebookConversionsApi;

class Controller extends \App\Http\Controllers\Controller
{

	public function __invoke(Request $request)
	{
		Job::dispatch($request->email, $request->amount);

		return response('success', 200);
	}

}
