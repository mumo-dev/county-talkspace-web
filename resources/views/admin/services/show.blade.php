@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
    </ol>


    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
          <div class="card-header bg-white"> <h4 class="m-0 p-0"> Request for {{ $service->type}} Service </h4></div>
          <div class="card-body">

            {{-- visible on medium and large devices --}}
            <div class="d-none d-sm-block">
              <table class="table">
                  <tr>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500">By:</span> </td>
                    <td> <i class="text-info fas mx-2 fa-user"></i> {{ $service->user->name }}</td>
                    <td class="text-white">spc</td>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500">Phone: </span> </td>
                    <td> <i class=" text-info fas fa-phone mx-2"></i> {{ $service->phone}} </td>
                      
                  </tr>

                  <tr>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500"> Location:</span> </td>
                    <td> <i class=" text-info mx-2 fas fa-map-marker-alt"></i> {{ $service->location }}</td>
                    <td class="text-white">spc</td>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500">Date: </span> </td>
                    <td> <i class="fa fa-calendar mx-2 text-info"></i> {{ $service->created_at->toDayDateTimeString()}} </td>
                      
                  </tr>
                  
              </table>
              </div>

              {{-- visible on small devices --}}
              <div class="d-block d-sm-none">
              <table class="ta">
                  <tr>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500">By:</span> </td>
                    <td>{{ $service->user->name }}</td>
                  </tr>
                  <tr>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500">Phone: </span> </td>
                    <td> {{ $service->phone}} </td>    
                  </tr>

                  <tr>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500"> Location:</span> </td>
                    <td>  {{ $service->location }}</td>
                  </tr>
                  <tr>
                    <td> <span class="text-primary text-uppercase " style="font-weight:500">Date: </span> </td>
                    <td> {{ $service->created_at->toDayDateTimeString()}} </td>
                  </tr>
                  
              </table>
              </div>
              
            <div class="mt-2">
              <span class="text-primary text-uppercase " style="font-weight:500">Description:</span> <br>
              <p> {{ $service->description}}</p>
              @if($service->image_url != null)
                <img src="{{ '/images/'.$service->image_url  }}" />
              @endif
            </div>
            
             <hr>
              <div style="">
                <create-service-comment :id="{{$service->id}}" :user="{{Auth::user()}}"></create-service-comment>
              </div>

          </div>
      </div>
    </div>
  
</div>
@endsection