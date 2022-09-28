@extends('user.layouts')


@section('body')
 
        <!--Lead Card-->
        <div class="flex h-full bg-white rounded overflow-hidden shadow-lg">
            <a href="{{ route('blog') }}" class="w-full flex flex-wrap no-underline hover:no-underline">
                <div class="w-full md:w-2/3 rounded-t">	
                    <img src="https://source.unsplash.com/collection/494263/800x600" class="h-full w-full shadow">
                </div>

                <div class="w-full md:w-1/3 flex flex-col flex-grow flex-shrink">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                        <p class="w-full text-gray-600 text-xs md:text-sm pt-6 px-6">GETTING STARTED</p>
                        <div class="w-full font-bold text-xl text-gray-900 px-6">👋 Welcome fellow Tailwind CSS and Ghost fan</div>
                        <p class="text-gray-800 font-serif text-base px-6 mb-5 ">
                            This starter template is an attempt to replicate the default Ghost theme "Casper" using Tailwind CSS and vanilla Javascript.
                        </p>
                    </div>

                    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                        <div class="flex items-center justify-between">
                            <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                            <p class="text-gray-600 text-xs md:text-sm">1 MIN READ</p>
                        </div>
                    </div>
                </div>

            </a>
        </div>
        <!--/Lead Card-->
        @if(isset($filters))
            
        
        <div class="w-5/6 m-auto p-2 text-xl text-gray-800 leading-normal mt-10 -mb-10">
            Filters : 
            
                <div class="ml-2 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 hover:bg-white hover:border-2 hover:border-green-700 transition ease-in duration-150 cursor-pointer rounded-full">
                     {{$filters}}
                </div >
                <a href="{{ route('home') }}" class="ml-2 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-red-200 text-red-500 hover:bg-white hover:border-2 hover:border-red-500 transition ease-in duration-150 cursor-pointer rounded-full"><span>x</span></a>
            
        </div>
        @endif
        
    <!--Posts Container-->
    <div class="flex flex-wrap justify-between pt-12 -mx-6">
        @foreach ($posts as $post)
            <!--1/3 col -->
            <div class="w-full md:w-1/3 post-item item-{{$loop->iteration}} p-6 flex flex-col flex-grow flex-shrink max-h-860-px overflow-hidden">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg max-h-860-px ">
                    <a href="{{ route('blog',$post) }}" class="flex flex-wrap no-underline hover:no-underline max-h-860-px overflow-hidden">
                        <img src="{{Storage::disk('local')->url($post->image)}}" class="h-64 w-full rounded-t pb-6">
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">{{$post->subtitle}}</p>
                        <div class="w-full font-bold text-xl text-gray-900 px-6">{{$post->title}}</div>
                        <div class="Pbody py-3 px-3 max-h-48 overflow-hidden">
                            <p class=" text-gray-800 font-serif px-6 mb-5" >
                                {!! $post->body !!}
                             </p>
                        </div>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                        <p class="text-gray-600 text-xs md:text-sm">{{$post->created_at->diffForHumans()}} / {{(int)(strlen($post->body)/500)}} MIN READ</p>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
    <div class="block">
        {{$posts->links()}}
    </div>
    <!--/ Post Content-->
@endsection