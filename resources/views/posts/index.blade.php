@extends('layouts.app')

@section('content')
<div class="container">
	
		@foreach($posts as $post)

		<div class="row">
		<div class="col-6 offset-3">
			<a href="/profile/{{$post->user-> id}}">
		<img src="/storage/{{$post-> image}}" class="w-100" alt="">
	</a>
	</div>


	</div>

	<div class="row pt-3 pb-5">

	<div class="col-6 offset-3">
		<div>
	{{-- 		<div class="d-flex align-items-center">
				<div class="pt-3">
					
					<img src="{{$post->user->profile-> profileImage()}}" class="rounded-circle" style="max-width:50px ;height:50px">

				</div>

				<div> 
					
					<div class="font-weight-bold pl-2"><a href="/profile/{{$post->user-> id}}" class="text-dark">{{$post->user-> username}}</a>    |

							<a href="#" class="pl-3">Follow</a>
					</div>

				</div>
			</div> --}}

			<hr>

			<p><span class="font-weight-bold pl-2"><a href="/profile/{{$post->user-> id}}" class="text-dark">{{$post->user-> username}}</a></span>

		
			{{$post-> caption}}</p>


		</div>
	</div>

	</div>

	@endforeach


		<div class="row">
			<div class="col-12 d-flex justify-content-center">
				{{$posts->links()}} 

			</div>

		</div>
</div>
@endsection
