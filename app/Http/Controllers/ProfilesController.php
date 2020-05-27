<?php

namespace App\Http\Controllers;

use App\User;
use App\profile;

use Illuminate\Support\Facades\cache;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



class ProfilesController extends Controller
{
     public function index(User  $user)
    {

       $follows = (auth()->user()) ? auth()->user()->following->contains($user-> id) : false;

       //using caches to count the number of times to calc the figures in the profile

       $postCount = Cache::remember('count.posts'. $user-> id,
            now()->addSeconds(3), 
              function() use($user) {

                return $user->posts->count();
       }); 

       $followersCount = Cache::remember('count.followers'. $user-> id,
            now()->addSeconds(3), 
              function() use($user) {

                return $user->profile->followers->count();
       });

        $followingCount = Cache::remember('count.following'. $user -> id,
            now()->addSeconds(3), 
              function() use($user) {

                return $user->following->count();
       });
    
    	// $user = User::FindorFail($user);

        return view('profiles.index',compact('user','follows','postCount','followersCount','followingCount')

        );
    }

   public function edit(User $user)
    {

    	$this->authorize('update', $user-> profile); //policy

    	// $user = User::FindorFail($user);

        return view('profiles.edit',compact('user')


        );
    }


    public function update(User $user)
    {
    	$this->authorize('update', $user-> profile); //policy


    	$data = request()->validate([
     		'title' => 'required',
     		'image'  => '',
     		'description' => ['required'],
     		'url' => ['']

     	]);

     	

     	//requesting from the user if he wanna change image

     	if(request('image')){

     		//if user is signed in

     	$ImagePath = request('image')->store('uploads','public');

     	$image = Image::make(public_path("storage/{$ImagePath}"))->fit(1000,1000);  //using the intervention class // i will read on it soon

     	$image->save();

     	$imageArray = ['image' => $ImagePath];

     	}

     		auth()->user()->profile->update(array_merge(
     		
     		$data, 
     		$imageArray ?? []

     		)); //updating image using core php  


     	return redirect("/profile/{$user-> id}");
     	


    }
}
