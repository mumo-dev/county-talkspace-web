@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('services') }}">Services</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
        </ol>

          @if (session('message'))
          <div class="alert alert-success" role="alert">
              {{ session('message') }}
          </div>
         @endif

          <a class="btn btn-sm btn-outline-secondary mb-2" href="{{ route('services')}}">All Services Requested</a>
          <div class="card">
                    <div class="card-header bg-white">{{ __('Request for a service ') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('service.store') }}">
                            @csrf

                            <label for="name" class=" col-form-label">{{ __('Service Type') }}</label>

                            <div class="form-group">
                                <select class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="type" required>
                                  <option value="">Select service type</option>
                                  <option value="ambulance">Ambulance Service</option>
                                  <option value="firefighting">Firefighting Equipment</option>
                                </select>

                                 @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>

                           <label for="description" class=" col-form-label">{{ __('Description') }}</label>

                            <div class="form-group">
                                <textarea id="description" placeholder="Tell us what happened ..." class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required  autofocus>
                                  {{ old('description') }}
                              </textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="phone" class=" col-form-label">{{ __('Your Phone Number') }}</label>

                            <div class="form-group">
                                <input id="phone" type="text" placeholder="eg 0701010101"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="location" class=" col-form-label">{{ __('Your Current Location') }}</label>

                            <div class="form-group">
                                <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" required autofocus>

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="image" class=" col-form-label">{{ __('Image of what\'s Happening (Optional)') }} </label> 
                            <div class="form-group">
                                <input id="image" type="file" class="form-control-file" name="image"accept="image/*" >

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                            <div class="form-group">
                              
                                <button type="submit" class="btn btn-primary">
                                    {{ __('REQUEST') }}
                                </button>
                            
                            </div>

                        </form>
              </div>
          </div>
           
      </div>
    </div>
</div>

@endsection