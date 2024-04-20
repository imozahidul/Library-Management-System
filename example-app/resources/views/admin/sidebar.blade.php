<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">

                <li><a href="{{url('category_page')}}"> <i class="icon-grid"></i>Category </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Books</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href=" {{url('add_books')}} ">Add Books</a></li>
                    <li><a href="{{url('show_books')}}">Show Books</a></li>
                  </ul>
                </li>
                <li><a href="{{url('borrow_request')}}"> <i class="icon-logout"></i>Borrow Request</a></li>
        
      </nav>