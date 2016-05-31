<!DOCTYPE html>
<html lang="es">
@include('includes.header')

<body class="sticky-header">

<section>
    @include('includes.sidebar')

    <!-- main content start-->
    <div class="main-content" >
        @include('includes.notification')



        <div class="wrapper">

                     @yield('content')


        </div>
        <!--body wrapper end-->


       @include('includes.footer')


    </div>
    <!-- main content end-->
</section>

 @include('partials.scripts')


</body>
</html>
