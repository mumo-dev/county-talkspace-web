@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
         <li class="breadcrumb-item ">
            <a href="{{ route('admin.events')}}"> Events</a>
         </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>


    <div class="row justify-content-center">
   
            <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">{{ __('CREATE AN EVENT ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.event.store') }}">
                        @csrf

                        <label for="name" class=" col-form-label">{{ __('Event Name') }}</label>

                        <div class="form-group">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                       <label for="start_time" class=" col-form-label">{{ __('Start (date and time)') }}</label>

                        <div class="form-group">
                            <input id="start_time" type="date" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="name" value="{{ old('start_time') }}" required autofocus>

                            @if ($errors->has('start_time'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('start_time') }}</strong>
                                </span>
                            @endif
                        </div>

                        <label for="location" class=" col-form-label">{{ __('Location') }}</label>

                        <div class="form-group">
                            <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" required autofocus>

                            @if ($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                            @endif
                        </div>

                        
                        <label for="description" class=" col-form-label">{{ __('Description') }}</label>

                        <div class="form-group">
                            <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  required autofocus>
                              {{ old('description') }}
                           </textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <label for="guests" class=" col-form-label">{{ __('Guests ') }}</label>

                        <div class="form-group">
                           <input id="guests" type="text" class="form-control{{ $errors->has('guests') ? ' is-invalid' : '' }}" 
                           name="guests" value="{{ old('guests') }}" placeholder="Guest 1, Guest 2, Guest 3" required autofocus>

                            @if ($errors->has('guests'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('guests') }}</strong>
                                </span>
                            @endif
                        </div>
                  

                        
                        <div class="form-group">
                           
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        
                        </div>

                    </form>
              </div>
     
        </div>
        
      </div>
    </div>
    


    
</div>
@endsection