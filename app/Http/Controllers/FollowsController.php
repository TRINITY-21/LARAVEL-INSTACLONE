<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{

	public function __construct(){

		$this-> middleware('auth'); // to disallow unregistered users to follow registereed ones
	}



    public function store(User $user){

    	//fetching the following relationship and toggling it with the profile and attched with it  

    	return auth()->user()->following()->toggle($user-> profile);

    }
}
