<!DOCTYPE html>
<html>

  <head>
    @include('admin.adminLayouts.head')
  </head>

  <body class="text-slate-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
      @include('admin.adminLayouts.navbar')
      <div class="relative md:ml-64 bg-slate-50">

        @include('admin.adminlayouts.topnav')
        @include('admin.adminlayouts.header')

        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          
           {{-- @yield('adminBody') --}}

           @section('adminBody')

               @show
           
          @include('admin.adminLayouts.footer')
        </div>
      </div>
    </div>

    @include('admin.adminLayouts.scripts')
  </body>
</html>