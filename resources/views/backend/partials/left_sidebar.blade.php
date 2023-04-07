<!-- partial:partials/_sidebar.html -->
{{-- sidebar-offcanvas --}}

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image"> 
          {{-- <img src="/images/faces/face4.jpg" alt="image"/>  --}}
          <span class="online-status online"></span> </div>
        <div class="profile-name">
          <p class="name">Raju</p>
          <p class="designation">Manager</p>
          <div class="badge badge-teal mx-auto mt-3">Online</div>
        </div>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">
      <span class="menu-title">Dashboard</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> 
        <span class="menu-title">ম্যানেজ প্রোডাক্ট</span>
        <i class="menu-arrow"></i></a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.products') }}">প্রোডাক্ট লিস্ট </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.create') }}">প্রোডাক্ট যুক্ত করুন</a></li>
          </ul>
        </div>
      </li>


    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#order-pages" aria-expanded="false" aria-controls="order-pages"> 
        <span class="menu-title">ম্যানেজ অর্ডার</span>
        <i class="menu-arrow"></i></a>
        <div class="collapse" id="order-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.orders') }}">ম্যানেজ অর্ডার </a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">ম্যানেজ ক্যাটাগরি</span><i class="menu-arrow"></i></a>
          <div class="collapse" id="category-pages">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('admin.categories') }}">ক্যাটাগরি লিস্ট</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">ক্যাটাগরি  যুক্ত করুন</a></li>
            </ul>
          </div>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="general-pages"> 
            <span class="menu-title">
            Manage Brands</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="brand-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brands') }}">Manage Brand</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brand.create') }}">Add Brand</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage Divisions</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="division-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.divisions') }}">Manage Division</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.division.create') }}">Add Division</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">
              Manage Districts</span><i class="menu-arrow"></i></a>
              <div class="collapse" id="district-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.districts') }}">Manage Districts</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a></li>
                </ul>
              </div>
            </li> --}}


          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#slider-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            ম্যানেজ স্লাইডার</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="slider-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.sliders') }}">ম্যানেজ স্লাইডার </a></li>
              </ul>
            </div>
          </li>


            <li class="nav-item">
              <a class="nav-link"  href="#district-pages">
                <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
                  @csrf
                  <input type="submit" value="Logout Now" class="btn btn-danger">
                </form>
              </a>

            </li>

          </ul>
        </nav>
        <!-- partial -->
@section('scripts')

<script>
 $('#sidebarhideshow').click(function (e) { 
  e.preventDefault();
  $('#sidebar').toggleClass('sidebar-offcanvas');

  
 });
</script>
@endsection