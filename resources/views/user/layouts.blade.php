<!DOCTYPE html>
<html lang="en">

    <head>
        @include('user.userLayouts.head')
    </head>

    <body class="bg-gray-200 font-sans leading-normal tracking-normal">

        @include('user.userLayouts.header')

        <!--Container-->
        <div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">
            
            <div class="mx-0 sm:mx-6">
                
                @include('user.userLayouts.navbar')

                <div class="bg-gray-200 w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t">
                    @yield('body') 
                </div>
                
                @include('user.userLayouts.subscribe')
                @include('user.userLayouts.author')

            </div>
        </div>
        
        @include('user.userLayouts.footer')
        @include('user.userLayouts.scripts')
    </body>
</html>