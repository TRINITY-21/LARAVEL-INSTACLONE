@extends('layouts.app')

@section('content')
<div class="container">



<div class="row">
    <div class="col-3 pl-5">
        
        <img src="{{$user-> profile-> profileImage()}}" class="rounded-circle" alt="" style= "height:170px; width:170px;">

    </div>
    
<div class="col-9 pt-4">

    <div class="d-flex justify-content-between align-items-baseline">

    <div  class="d-flex align-items-center pb-4">
        <div class="h4">{{$user-> username}}</div>

        <follow-button user-id="{{$user-> id}}" follows="{{$follows}}"></follow-button>
    </div>
    @can('update', $user-> profile)

        <a href="/p/create" class="btn btn-secondary" >Add New Post</a>
    @endcan

    </div>

        @can('update', $user-> profile)
            <a href="/profile/{{$user-> id}}/edit" class="btn btn-primary">Edit Profile</a>
        @endcan

        <div class="d-flex">
            <div class="pr-4"><strong>{{-- {{$user->posts->count()}} using cache instead --}}  {{ $postCount }} </strong>posts</div>
            <div class="pr-4"><strong>{{-- {{$user->profile->followers->count()}} --}}   {{$followersCount}}</strong>followers</div>
            <div class="pr-4"><strong>{{-- {{$user->following->count()}} --}}  {{$followingCount}}</strong>following</div>
        </div>

        <div class="pt-3 font-weight-bold">{{$user-> profile-> title}}</div>
        <div>{{$user-> profile-> description}}</div>
        <div><a href="#">{{$user-> profile-> url}}</a></div>
</div>


</div>

    <div class="row pt-5">

    @foreach($user-> posts as $post)
        <div class="col-4 pb-3">

            <a href="/p/{{$post-> id}}">

            <img src="/storage/{{$post-> image}}" class="w-100">
            </a> 

        </div>
    @endforeach







        {{-- <div class="col-4 pb-3">
            <img src="/svg/logo3.jpg" alt="" class="w-100" >
        </div> 
        <div class="col-4">
            <img src="/svg/logo3.jpg" alt="" class="w-100" >
        </div> 
        <div class="col-4">
            <img src="/svg/logo3.jpg" alt="" class="w-100" >
        </div>   <div class="col-4">
            <img src="/svg/logo3.jpg" alt="" class="w-100" >
        </div> 
        <div class="col-4">
            <img src="/svg/logo3.jpg" alt="" class="w-100" >
        </div> 
        <div class="col-4">
            <img src="/svg/logo3.jpg" alt="" class="w-100" >
        </div>
        
         --}}

    </div>

</div>











    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
