@include('backend.layouts.header')
@include('backend.layouts.top-nav')
 <div id="layoutSidenav">
     @include('backend.layouts.side-bar')
     <div id="layoutSidenav_content">
         <main>

            @yield('main-content')
            
         </main>
         @include('backend.layouts.copyright')
     </div>
 </div>
 @include('backend.layouts.footer')