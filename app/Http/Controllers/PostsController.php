<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){

        $users = auth()->user()->following()->pluck('profiles.user_id'); //identify id how many people the authenticated user is following

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));

    }



    public function create()
     {

        return view('posts.create');
    }


    public function store()
     {

     	$data = request()->validate([
     		'caption' => 'required',
     		'image'  => ['required','image']

     	]);


     	//if user is signed in

     	$ImagePath = request('image')->store('uploads','public');

     	$image = Image::make(public_path("storage/{$ImagePath}"))->fit(1000,1000);  //using the intervention class // i will read on it soon

     	$image->save();

    	auth()->user()->posts()->create([

    		'caption' => $data['caption'],
    		'image'  => $ImagePath
    	]);




    
     //\App\Post::create($data);

		//dd('hit');


        return redirect('/profile/'. auth()->user()-> id);
    }




    public function show(Post $post){

    		
    	return view('posts.show',compact('post'));

    }
}
