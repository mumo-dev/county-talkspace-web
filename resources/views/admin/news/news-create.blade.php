@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
         <li class="breadcrumb-item ">
            <a href="{{ route('admin.news')}}"> NEWS</a>
         </li>
        <li class="breadcrumb-item active">Add </li>
    </ol>


    <div class="row justify-content-center">
   
            <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">{{ __('Publish  News') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.news.store') }}"
                     enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                          <label for="name" class=" col-form-label">{{ __('Title')}}</label>
                          <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="description" class=" col-form-label">{{ __('Description') }}</label>
                            <textarea id="description" rows=10
                            type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required  autofocus>
                              {{ old('description') }}
                           </textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                       
                        <div class="form-group">

                          <label for="photo" class=" col-form-label">{{ __('Upload Photo (Optional)') }}</label>

                           <input id="guests" type="file"
                              accept="image/*"
                              class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}" 
                              name="photo" >

                        </div>
                  

                        
                        <div class="form-group">
                           
                            <button type="submit" class="btn btn-primary">
                                {{ __('Publish') }}
                            </button>
                        
                        </div>

                    </form>
              </div>
     
        </div>
        
      </div>
    </div>  
</div>

@endsection
