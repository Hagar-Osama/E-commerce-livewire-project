<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 @include('layouts.head')
</head>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
   @include('layouts.main-header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     @include('layouts.main-sidebar')
      <!-- partial -->
      <div class="main-panel">
       @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    @include('layouts.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

 @include('layouts.scripts')
</body>

</html>

