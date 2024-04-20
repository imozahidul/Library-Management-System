<!DOCTYPE html>
<html lang="en">

  <head>
    @include('home.css')
    <style>
        .t_d{
            border: 1px solid  white ;
            margin: auto;
            text-align: center;
            margin-top: 100px;
        }
        th{
            background-color: #7453FC;
            color: white;
            font-weight: bold;
            font-size: 15px;
            padding: 15px;

        }
        td{
            color: white;
            background-color: black;
            border: 1px solid white;
        }
        .b_i{
            height: 120px;
            width: 80px ;
            margin: auto;
            margin-top: 6px;
            margin-bottom: 6px;

        }
    </style>
  </head>

<body class="bg-dark">


    @include('home.header')
  
    <div class="currently-market">
    <div class="container">
      <div class="row">
        <table class="t_d">
            <tr>
                <th>Book Name</th>
                <th>Author</th>

                <th> Book Status</th>

                <th> Image</th>

            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{$data->book->title}}</td>
                <td>{{$data->book->author_name}}</td>
                <td>{{$data->status}}</td>
                <td>
                    <img class="b_i" src="book/{{$data->book->book_img}}" alt="">
                </td>
            </tr>
            @endforeach
        </table>
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