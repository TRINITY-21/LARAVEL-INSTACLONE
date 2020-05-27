<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $guarded =[];

    public function user(){

    	return $this->belongsTo(user::class);
    }



    public function profileImage(){

    	$imagePath  = ($this-> image) ? $this-> image : 'profile/logo4.png';


    	return '/storage/'. $imagePath;

    
    }


    //follows model

    public function followers(){

        return $this->belongsToMany(User::class);
    }
}
