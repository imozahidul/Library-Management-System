<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            margin: auto;
        }
        .cat_label{
            font-size: 30px;
            font-weight: bold;
            padding: 30px;
            color: white;
        }
        .center{
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 50px;
          border: 1px solid white ;
        }
        th{
          background-color: orange;
          padding: 15px;
          color: black;
        }
        tr{
          border: 1px solid white;
          padding: 15px;
          
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

            <div class="div_center">
              <div>
                @if(session()->has('message'))

                <div class="alert alert-warning">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                </div>
                @endif
              </div>
                <h1 class="cat_label">Add Category</h1>
                <form action="{{url('add_category')}}" method="post">
                    @csrf
                    <span style="padding-right: 15px;">
                    <label>Category Name</label>
                    <input  type="text" name="category" required>
                    </span>
                    <input class="btn btn-warning" type="submit" value="Add  Category">

                </form>

              <div>
                <table class="center">
                  <tr>
                    <th>
                      Category Name
                    </th>
                    <th>
                      Delete
                    </th>
                  </tr>
                  @foreach($data as $data)
                  <tr>
                    <td>
                      {{$data->cat_title}}
                    </td>
                    <td>
                      <a style="margin: 8px;" class="btn btn-danger" href="{{url('cat_delete', $data->id)}}">x</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>

            </div>

          </div>
        </div>
      </div>



    @include('admin.footer')
  </body>
</html>