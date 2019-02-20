<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	public function showIndex()
	{
		echo "lol";
		return view('user.index');
	}
}