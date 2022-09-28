@extends('user.layouts')

@section('body')
	
	<!--Title-->
	<div class="text-center pt-16 md:pt-32">
		<p class="text-sm md:text-base text-green-500 font-bold">{{$slug->created_at->diffForHumans()}} <span class="text-gray-900">/</span> {{(int)(strlen($slug->body)/500)}} min read</p>
		<h1 class="font-bold break-normal text-3xl md:text-5xl">{{$slug->title}}</h1>
		<h3 class="font-semibold break-normal text-2xl text-gray-600 mt-3">{{$slug->subtitle}}</h3>
	</div>
	<!--image-->
	<div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" style="background-image:url('{{Storage::disk('local')->url($slug->image)}}'); height: 75vh;"></div>
	
	<!--Container-->
	<div class="container max-w-5xl mx-auto -mt-32">
		
		<div class="mx-0 sm:mx-6">
			<div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
				
				<!--Post Content-->
				{!! $slug->body !!}
						
				<hr class="border-1 border-gray-500 w-6/7 m-auto my-10">


				<div class="w-5/6 m-auto p-2 text-xl text-gray-800 leading-normal">
					Categories : 
			
					@foreach ($slug->categories as $category)
					  <div class="ml-2 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700  hover:bg-white hover:border-2 hover:border-blue-700 transition ease-in duration-150 cursor-pointer rounded-full">
						<a href="{{ route('categoryPosts', $category) }}">{{$category->name}}</a>
					  </div>
					@endforeach
				</div>
				<div class="w-5/6 m-auto p-2 text-xl text-gray-800 leading-normal">
					Tags : 
					@foreach ($slug->tags as $tag)
						<div class="ml-2 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 hover:bg-white hover:border-2 hover:border-green-700 transition ease-in duration-150 cursor-pointer rounded-full">
							<a href="{{ route('tagPosts', $tag) }}">{{$tag->name}}</a>
						</div>
					@endforeach
				</div>
				<div class="fb-comments ml-14" data-href="https://localhost:8000" data-width="" data-numposts="5"></div>
			</div>
		</div>
	</div>

	<div class="bg-gray-200">
	
		<div class="container w-full max-w-6xl mx-auto px-2 py-8">
			<div class="flex flex-wrap -mx-2">
				<div class="w-full md:w-1/3 px-2 pb-12">
					<div class="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
						<a href="#" class="no-underline hover:no-underline">
								<img src="https://source.unsplash.com/_AjqGGafofE/400x200" class="h-48 w-full rounded-t shadow-lg">
								<div class="p-6 h-auto md:h-48">	
									<p class="text-gray-600 text-xs md:text-sm">GETTING STARTED</p>
									<div class="font-bold text-xl text-gray-900">Lorem ipsum dolor sit amet.</div>
									<p class="text-gray-800 font-serif text-base mb-5">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula. 
									</p>
								</div>
								<div class="flex items-center justify-between inset-x-0 bottom-0 p-6">
									<img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
									<p class="text-gray-600 text-xs md:text-sm">2 MIN READ</p>
								</div>
						</a>
					</div>
				</div>
				<div class="w-full md:w-1/3 px-2 pb-12">
					<div class="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
						<a href="#" class="no-underline hover:no-underline">
								<img src="https://source.unsplash.com/_AjqGGafofE/400x200" class="h-48 w-full rounded-t shadow">
								<div class="p-6 h-auto md:h-48">	
									<p class="text-gray-600 text-xs md:text-sm">UNDERWATER</p>
									<div class="font-bold text-xl text-gray-900">Biolumini algae diatomeae ecology.</div>
									<p class="text-gray-800 font-serif text-base mb-5">
										Lorem ipsum dolor sit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula. 
									</p>
								</div>
								<div class="flex items-center justify-between inset-x-0 bottom-0 p-6">
									<img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
									<p class="text-gray-600 text-xs md:text-sm">4 MIN READ</p>
								</div>
						</a>
					</div>
				</div>
				<div class="w-full md:w-1/3 px-2 pb-12">
					<div class="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
						<a href="#" class="no-underline hover:no-underline">
								<img src="https://source.unsplash.com/DEa8_vxKlEo/400x200" class="h-48 w-full rounded-t shadow">
								<div class="p-6 h-auto md:h-48">	
									<p class="text-gray-600 text-xs md:text-sm">FOREST</p>
									<div class="font-bold text-xl text-gray-900">What is life but a teardrop in the eye of infinity?</div>
									<p class="text-gray-800 font-serif text-base mb-5">
										Mollis pretium integer eros et dui orci, lectus nec elit sagittis neque. Dignissim ac nullam semper aliquet volutpat, ut scelerisque.
									</p>
								</div>
								<div class="flex items-center justify-between inset-x-0 bottom-0 p-6">
									<img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
									<p class="text-gray-600 text-xs md:text-sm">7 MIN READ</p>
								</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		</div>
@endsection