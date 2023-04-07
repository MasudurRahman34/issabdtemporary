@extends('backend.layouts.master')

@section('content')

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card card-body">
        <h3>Welcome to your Isshabd Admin Panel</h3>
        <br>
        <br>
        <p>
          <a href="{!! route('index') !!}" class="btn btn-primary btn-lg" target="_blank">Visit Main Site</a>
        </p>
      </div>

      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card" style="background-color: bisque">
          <div class="card-header">
            আজকের অর্ডার 
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center text-center">
              <h1>{{$report['todayOrder']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>
       
        <div class="col-md-4 mb-4">
          <div class="card" style="background-color: bisque">
          <div class="card-header">
           আজকের গৃহীত অর্ডার 
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
              <h1>{{$report['todayConfirm']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card" style="background-color: bisque">
          <div class="card-header">
          আজকের অগৃহীত অর্ডার
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
              <h1>{{$report['todayNotConfirm']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card" style="background-color:aquamarine">
          <div class="card-header">
            আজকের ইনকাম
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
              <h1>{{$report['todayIncome']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>

         
        <div class="col-md-4 mb-4">
          <div class="card" style="background-color:aquamarine">
          <div class="card-header">
           আজকের বাকি
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
              <h1>{{$report['todayPayable']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>
         <div class="col-md-4 mb-4">
          <div class="card" style="background-color: bisque">
          <div class="card-header">
            সর্বমোট অর্ডার 
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
              <h1>{{$report['totalOrder']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card" style="background-color:aquamarine">
          <div class="card-header">
           সর্বমোট ইনকাম
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
              <h1>{{$report['totalIncome']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>
         <div class="col-md-4 mb-4">
          <div class="card" style="background-color:aquamarine">
          <div class="card-header">
           সর্বমোট বাকি
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
              <h1>{{$report['totalPayable']}}</h1>
             
            </blockquote>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2023 <a href="http://www.isshabd.com/" target="_blank">isshabd.com</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">isshabd.com <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
@endsection
