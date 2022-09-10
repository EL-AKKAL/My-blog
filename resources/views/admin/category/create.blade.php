@extends('admin.layout')

@section('adminBody')
<main>
    <section class="relative w-5/6 mx-auto px-10">
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
                  <h3 class="text-blueGray-500 text-2xl font-bold">Create New Category</h3>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
              </div>
              @include('admin.adminLayouts.errors')
              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="name">
                      Category Name : <span class="font-medium lowercase text-xs">(max : 100 char)</span>
                    </label>
                    <input name="name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-500 text-blueGray-600 bg-white rounded text-md shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Category name here..."/>
                  </div>
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="slug">
                      category Slug : <span class="font-medium lowercase text-xs">(max : 100 char)</span>
                    </label>
                    <input name="slug" type="text" class="border-0 px-3 py-3 placeholder-blueGray-500 text-blueGray-600 bg-white rounded text-md shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Category slug here..."/>
                  </div>
                  <div class="flex items-center justify-center">
                    <div class="text-center mt-6 w-36 mx-auto">
                      <input type="submit"  class="bg-indigo-500 hover:bg-indigo-700 text-white  text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 cursor-pointer" value="Create">
                    </div>
                    <div class="text-center mt-6 w-36 mx-auto">
                        <a href="{{ route('category.index') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 cursor-pointer">Cancel</a>
                    </div>
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