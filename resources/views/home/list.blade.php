@extends('layouts.home')

@section('content')
<div class="container-fluid" style="min-height: 80vh">

  <section class="search-bar mt-2 px-0 ">
    <div class="py-4">
      <div class="row">

        <div class="col-md-6 offset-md-3">
          <form action="{{route('home.search')}}" method="GET">
            @csrf
            <div class="row m-1">
              <div class="col-md-12 input-group">
                <input type="text" name="q" class="form-control" placeholder="Search By Name" />
                <span class="input-group-append">
                  <button type="submit" class="btn btn-primary pt-1">
                    <span class="fas fa-search"></span> Search Bus
                  </button>
                </span>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>

  <div class="row ">
    <div class="col-sm-12 col-md-5 col-xl-4">
      <div class="card p-0 m-0">
        <div class="card-body p-3">
          <div class="d-flex align-items-center small mb-0">
            <i class="fas fa-search mr-1"></i>
            <strong>Refine Your Bus search</strong>
          </div>
        </div>
      </div>
      <div class="card border-top-0">
        <div class="card-body p-3" id="jobCategories">
          <div class="pb-0">
            <div class="card-title mb-1">Bus Arrival days</div>
            <div class="card-body p-0">
              <div class="form-group">
                <form action="{{route('home.search')}}" method="Get" id="arrivalDaysForm">
                <select name="arrivalDays" class="form-control" value="{{Request::get('arrivalDays')}}" placeholder="Filter by Job Category" id="filterArrivalDays">
                    <option disabled selected value>
                      -- select an option --
                    </option>
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
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-7 col-xl-8">
      <div class="card mt-md-0 mt-3">
        <div class="card-body ">
          <h1 class="h6 ">
            Showing results
          </h1>
        </div>
      </div>
      <div class="card-body">
        
        @if($buses->count())
        @foreach($buses as $bus)
          <div class="bg-white p-3 shadow mb-3">
            <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-3 mx-auto mb-sm-4">
                <img src="{{asset($bus->img)}}" class="img-fluid" alt="Bus img">
              </div>
              <div class="col-sm-12 col-md-7 ">
                <h5 class="secondary-link font-weight-bold">
                  <a href="{{route('home.show',['bus'=>$bus->id])}}" target="_blank">
                   {{$bus->name}}
                  </a>
                </h5>
                <h6 class="mt-2">
                  Bus code : {{$bus->bus_code}}
                </h6>
    
                <div class="small my-1 d-flex">
                  <div class="mr-4">
                    <span>from: </span>
                    <span class="text-primary">{{$bus->from}}</span>
                  </div>
                  <div>
                    <span>to: </span>
                    <span class="text-primary">{{$bus->to}}</span>
                  </div>
                </div>

                <div class="small my-1 d-flex">
                  <div class="mr-4">
                    <span>Arrival time: </span>
                    <span class="text-primary">{{$bus->arrival_time}}</span>
                  </div>
                  <div>
                    <span>Arrival days: </span>
                    <span class="text-primary">{{$bus->arrival_days}}</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-2">
                <div class="">
                  <p class="h5 text-primary">${{number_format($bus->fare)}}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @else
        <div class="bg-white p-3 shadow mb-3">
          <p class="h5 text-center mb-4">No such results. Search for another name</p>
          <div class="row">
            <div class="col-sm-6 col-md-4 mx-auto">
              <img src="{{asset('images/not-found.svg')}}" class="img-fluid" alt="">
            </div>
          </div>
        </div>
        @endif

        <div class="d-flex justify-content-center">
          {{$buses->links()}}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection

@push('js')
<script>
  $(document).ready(function(){
    let arrivalDaysForm = document.querySelector('#arrivalDaysForm');
    let filterArrivalDays = document.querySelector('#filterArrivalDays');
    filterArrivalDays.addEventListener('change',function(){
      arrivalDaysForm.submit();
    });
  });
</script>
@endpush