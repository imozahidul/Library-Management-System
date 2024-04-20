<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .center{
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
            margin-top: 60px;
        }
        th{
            background-color: orange;
            text-align: center;
            color: black;
            font-size: 15px;
            font-weight: bold;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            
          <table class="center">
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Book Title</th>
                <th>Quantity</th>
                <th>
                    Borrow Status
                </th>
                <th>Book Image</th>
                <th>Action</th>


            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{$data->user->name}}</td>
                <td>{{$data->user->email}}</td>

                <td>{{$data->user->phone}}</td>

                <td>{{$data->book->title}}</td>

                <td>{{$data->book->quantity}}</td>
                <td>
                    {{$data->status}}
                </td>
                <td>
                    <img style="height: 100px; width:70px " src="book/{{$data->book->book_img}}" alt="">
                </td>
                <td>
                    <a style="margin: 2px; padding: 2px;" class="btn btn-success" href="{{url('approve_book', $data->id)}}">Approved</a>
                    <br>
                    <a style="margin: 2px; padding: 5px;" class="btn btn-danger" href="{{url('return_book', $data->id)}}">Returned</a>
                    <br>
                    <a style="margin: 2px; padding: 4px;" class="btn btn-info" href="{{url('rejected_book', $data->id)}}">Rejected</a>
                </td>

            </tr>
            @endforeach
          </table>


          </div>
        </div>
      </div>
    @include('admin.footer')
  </body>
</html>