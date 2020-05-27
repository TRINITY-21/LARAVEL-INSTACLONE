@extends('layouts.app')

@section('content')
<div class="container">

	<form action="/p" enctype="multipart/form-data" method="Post">

		@csrf
		
	<div class="row">
		<div class="col-8 offset-2">

			 <div class="row">
			 		<h1 class="btn btn-secondary">Add New Post</h1>
			 </div>
			
				 <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label">{{ __('Posts caption') }}</label>
			                      
			                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('cation') }}" required autocomplete="caption" autofocus>
			                           @error('caption')
			                        <span class="invalid-feedback" role="alert">
			                          <strong>{{ $message }}</strong>
			                         </span>
			                                @enderror
			                           
                        </div> 


                        <div class="row">

                        	<label for="image" class="col-md-4 col-form-label">{{ __('Posts image') }}</label>

                        	<input type="file" class="form-control" id="image" name="image">


                        	 @error('image')
			                        <span class="invalid-feedback" role="alert">
			                          <strong>{{ $message }}</strong>
			                         </span>
			                                @enderror

                        </div>

                         <div class="row pt-4">
                         	<button class="btn btn-secondary">Add New Post</button>
                         </div>


		</div>

	</div>



	</form>

</div>
@endsection
