<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
   
  </head>
  <body class="bg-dark">
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      @include('admin.body')
    @include('admin.footer')
  </body>
</html>