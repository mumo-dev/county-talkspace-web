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
        @forelse($services as $service)
        <a href="{{ route('admin.service.show', $service->id)}}" style="text-decoration:none;color:black">
          <div class="card mb-2">
              <div class="card-body">
                <span class="" style="font-size:16px;color:#006d5d">
                  <span class="font-weight-bold text-uppercase"> {{ $service->user->name }}  -  {{ $service->phone }} </span> from {{ $service->location }} </span>
                
                  @if($service->status == 0 ) 
                    <span class="badge badge-danger p-2 float-right"> NEW</span>
                 @endif
                <p class="m-0">
                  requested for 
                 {{ $service->type }} services on 
                 {{ $service->created_at->toDayDateTimeString() }}
                </p>
              </div>
          </div>
        </a>
        @empty
        <div class="alert alert-info">
          No services Requested yet
        </div>
        @endforelse


        <div class="paginate">
            {{ $services->links() }}
        </div>
      </div>
    </div>
    


    {{-- <script>
      function updateService(id) {

          alert(id);
      }
    </script> --}}
</div>
@endsection