@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Manage Accounts</li>
    </ol>

    <div class="">
       <a class="btn btn-success" href="{{ route('admin.account.create')}}">Create Account</a>
    </div>

    {{-- <i class="far fa-id-card"></i> --}}
     @if (session('message'))
          <div class="alert alert-success mt-2" role="alert">
              {{ session('message') }}
          </div>
    @endif
    <div class="card mt-3">
      <div class="card-body">
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($users as $user)
              <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                  <button class="btn btn-danger btn-sm" onclick="updateDataModel('{{ $user->id}}')"
                   data-toggle="modal" data-target="#deleteUserModal"
                  >Delete</button>
              </td>
            </tr>
          @endforeach
         
        </tbody>
      </table>
      </div>
    </div>


    {{-- modal --}}
    <!-- Button trigger modal -->
 

    <!-- Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure u want to delete this account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="{{ route('admin.account.delete')}}">
            @csrf
               <input type="hidden" name="userId" id="userId"/> 

            <div class="modal-body">
                Once deleted. You won't be able to recover this account.<br>
                To proceed click 'Delete'.

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>


    <script>
      function updateDataModel(id) {
        // alert(id);
        $('#userId').val(id);
      }
    </script>
    
</div>
@endsection