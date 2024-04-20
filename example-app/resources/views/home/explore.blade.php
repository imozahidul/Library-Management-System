<!DOCTYPE html>
<html lang="en">

  <head>
    @include('home.css')
  </head>

<body class="bg-dark">


    @include('home.header')
  

    <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <!-- <div class="line-dec"></div> -->
            <h2>Explore Books</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="filters">
            
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid">
            @foreach($data as $data)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="book/{{$data->book_img}}" alt="" style="border-radius: 20px; min-width: 195px; max-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$data->title}}</h4>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Currently Available<br><strong>{{$data->quantity}}</strong><br> 
                  </span>
                  
                  <div class="text-button">
                    <a href="">View Item Details</a>
                  </div>
                  <div class="text-button">
                    <a class="btn btn-info" href="{{url('borrow_books',$data->id)}}">Borrow</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  

  @include('home.footer')


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>