<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .table_center {
            text-align: center;
            margin: auto;
            border: 1px solid white;
            margin-top: 50px;
        }

        th {
            background-color: orange;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        .img_book {
            width: 80px;
            border-radius: 2px;
            padding: 4px;
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
                    @if(session()->has('message'))

                    <div class="alert alert-warning">
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    </div>
                    @endif
                    <div>
                        <table class="table_center">
                            <tr>
                                <th>Book Title</th>
                                <th>Author Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <!-- <th>Description</th> -->
                                <th>Category</th>
                                <th>Book Image</th>
                                <th>Delete</th>
                                <th>Update</th>



                            </tr>
                            @foreach($book as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author_name}}</td>
                                <td>{{$book->price}}</td>
                                <td>{{$book->quantity}}</td>
                                <!-- <td>{{$book->description}}</td> -->
                                <td>{{$book->category->cat_title}}</td>
                                <td>
                                    <img class="img_book" src="book/{{$book->book_img}}" alt="">
                                </td>
                                <td>
                                    <a href="{{url('book_delete', $book->id)}}" class="btn btn-danger">X</a>
                                </td>
                                <td>
                                    <a href="{{url('edit_book', $book->id)}}" class="btn btn-info">U</a>
                                </td>
                            </tr>

                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @include('admin.footer')
</body>

</html>