@extends('admin.layout')

@section('adminBody')
<main>
    <section class="relative w-full">
      <div
        class="absolute top-0 w-full h-full bg-full bg-no-repeat"
        style="background-image: url(../../assets/img/register_bg_2.png)"
      ></div>
      <div class="container mx-auto px-4 h-full w-full">
        <div class="flex content-center items-center justify-center h-full">
          <div class="w-full px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0">
              <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                  <h3 class="text-blueGray-500 text-2xl font-bold">Post Update Area</h3>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
              </div>

              @include('admin.adminLayouts.errors')

              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <div class="text-blueGray-400 text-center mb-3 font-bold">
                    <small>changes will be applied on Post of ID : {{$post->id}}</small>
                </div>
                <form action="{{ route('post.update',$post) }}" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="title">
                      Title : <span class="font-medium lowercase text-xs">(max : 255 char)</span>
                    </label>
                    <input value="{{$post->title}}" name="title" type="text" class="border-0 px-3 py-3 placeholder-blueGray-500 text-blueGray-600 bg-white rounded text-md shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Blog title here..."/>
                  </div>
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="subtitle">
                      Sub Title : <span class="font-medium lowercase text-xs">(max : 100 char)</span>
                    </label>
                    <input value="{{$post->subtitle}}" name="subtitle" type="text" class="border-0 px-3 py-3 placeholder-blueGray-500 text-blueGray-600 bg-white rounded text-md shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Blog subtitle here..."/>
                  </div>
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="slug">
                      Slug : <span class="font-medium lowercase text-xs">(max : 100 char)</span>
                    </label>
                    <input value="{{$post->slug}}" name="slug" type="text" class="border-0 px-3 py-3 placeholder-blueGray-500 text-blueGray-600 bg-white rounded text-md shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Blog slug here..."/>
                  </div>
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="image">
                      Image :
                    </label>
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                          <input  type="file" id="formFile" name="image" class="form-control block w-full px-3  py-1.5 text-base font-normal text-gray-700  bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        </div>
                    </div>
                  </div>

                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="body">
                      Blog Body
                    </label>
                    <textarea name="body" id="editor" cols="30" rows="10">{{$post->body}}</textarea>
                  </div>
                  <h3 class="mb-3 mt-5 font-semibold text-gray-900">Tags</h3>
                  <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg flex flex-wrap">
                  @forelse ($tags as $tag)
                  <li class="min-w-48 border border-gray-200 ">
                    <div class="flex items-center pl-3">
                        <input
                        @foreach ($post->tags as $postTag)
                            @if ($tag->id == $postTag->id)
                                checked
                            @endif
                        @endforeach
                        name="tags[]" id="tag-{{$tag->id}}" type="checkbox" value="{{$tag->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 ">
                        <label for="tag-{{$tag->id}}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900">{{$tag->name}}</label>
                    </div>
                  </li>
                  @empty
                      <h4>Tags Database is empty</h4>
                  @endforelse
                  </ul>
                  <h3 class="mb-3 mt-5 font-semibold text-gray-900">Tags</h3>
                  <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg flex flex-wrap mb-6">
                  @forelse ($categories as $category)
                  <li class="min-w-48 border border-gray-200 ">
                    <div class="flex items-center pl-3">
                        <input id="category-{{$category->id}}"
                        @foreach ($post->categories as $postCategory)
                            @if ($category->id == $postCategory->id)
                                checked
                            @endif
                        @endforeach
                        name="categories[]" type="checkbox" value="{{$category->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 ">
                        <label for="category-{{$category->id}}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900">{{$category->name}}</label>
                    </div>
                  </li>
                  @empty
                      <h4>Categories Database is empty</h4>
                  @endforelse
                  </ul>
                  <div>
                    <label class="inline-flex items-center cursor-pointer" for="status">
                      <input @if ($post->status == 1) checked @endif id="customCheckLogin" type="checkbox" name="status" class="border-2 border-solid border-blue-500 form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"/>
                      <span class="ml-2 text-sm font-semibold text-blueGray-600">Publish (if you choose not to publish , this post will be saved in your profile only)</span>
                    </label>
                  </div>
                  <div class="flex items-center justify-center">
                    <div class="text-center mt-6 w-36 mx-auto">
                      <input type="submit"  class="bg-indigo-500 hover:bg-indigo-700 text-white  text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 cursor-pointer" value="Update">
                    </div>
                    <div class="text-center mt-6 w-36 mx-auto">
                        <a href="{{ route('post.index') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 cursor-pointer">Cancel</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection