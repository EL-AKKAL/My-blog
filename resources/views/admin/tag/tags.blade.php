@extends('admin.layout')

@section('adminBody')
<main>
    <section class="relative w-5/6 mx-auto px-10">
        <div class="flex flex-wrap mt-4 w-full">
            <div class="w-full mb-12 xl:mb-0 px-4 min-h-screen-55">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded min-h-fit md:min-h-330px">
                    <div class="rounded-t mb-0 px-4 border-0 flex items-center flex-row py-5">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-blueGray-700"> Tags Database </h3>
                            </div>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('tag.create') }}" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                <i class="fa-solid fa-plus"></i> New Tag
                            </a>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Tag ID </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Tag Name </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Tag Slug </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Settings </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tags as $tag)
                                    <tr>
                                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">{{$tag->id}}</th>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{$tag->name}}</td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"> {{$tag->slug}} </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="relative w-full pl-0 px-4 max-w-full flex-grow flex-1 text-left">
                                                <a href="{{ route('tag.edit',$tag->id) }}" class="bg-indigo-500 hover:text-pink-900 hover:bg-white text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('tag.destroy',$tag->id) }}" class="inline-block" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('do you really want to delete Tag with ID : {{$tag->id}} ?')" type="submit" class="bg-indigo-500 hover:text-pink-900 hover:bg-white text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"><i class="fa-sharp fa-solid fa-eraser"></i></button>
                                                </form>
                                                <button class="bg-indigo-500 hover:text-pink-900 hover:bg-white text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"><i class="fa-solid fa-eye"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Tag ID </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Tag Name </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Tag Slug </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"> Settings </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection