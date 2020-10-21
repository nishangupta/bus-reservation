@extends('layouts.home')

@section('content')
<div class="container-fluid">

  <h1 class="h3 mb-0 text-gray-800">Home </h1>
  <p>Search available buses here.</p>

  <div class="row align-items-center">

    <div class="col-xl-6 col-md-12 mb-4 small">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <form action="" method="GET">
            
            <div class="form-group">
              <label for="">
                <i class="fas fa-map-marker-alt"></i>
                From :
              </label>
              <input type="text" placeholder="Arrival location" name="arrival_location" class="form-control">
            </div>
            <div class="form-group">
              <label for="">
                <i class="fas fa-map-marker-alt"></i>
                To :
              </label>
              <input type="text" placeholder="Destination" name="destination" class="form-control">
            </div>
            <div class="form-group">
              <label for="">
                <i class="fas fa-calendar-alt"></i>
                Availability :
              </label>
             <select name="arrival_days" class="form-control">
              <option value="Everyday">Everyday</option>
              <option value="Sunday">Sunday</option>
              <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
              <option value="Wednesday">Wednesday</option>
              <option value="Thursday">Thursday</option>
              <option value="Friday">Friday</option>
              <option value="Saturday">Saturday</option>
              <option value="Everyday except saturday">Everyday except saturday</option>
              <option value="Everyday except sunday">Everyday except sunday</option>
             </select>
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="w-50 mx-auto">
        <img src="{{asset('images/yatch.svg')}}" class="img-fluid" alt="">        
      </div>
    </div>

  </div>

  <hr class="line-divider">

  <h1 class="h3 mb-0 text-gray-800">Explore our latest commutes.</h1>
  <br>

  <div class="row">
    @foreach($buses as $bus)
    <div class="col-sm-6 col-md-3">
      <div class="card text-center shadow h-100">
        <img src="{{asset($bus->img)}}" class="img-fluid" alt="Bus img">
        <div class="card-body">
          <p class="card-title">{{$bus->name}}</p>
          <a href="{{route('home.show',['bus'=>$bus])}}" class="btn btn-primary">Buy tickets</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <br>
  <br>
  
  <h1 class="h4 mb-0 text-gray-800 text-center my-4">Didn't match any? <a href="#" class="btn btn-sm btn-primary">We have more</a></h1>
  <br>


</div>
@endsection