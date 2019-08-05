@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create New User profile</h5>

        <form action="{{ route('user.store') }}" method="post">
            @csrf
        
            <div class="form-group">
                <label for="name">User</label>
                <input  class="form-control" type="text" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input  class="form-control" type="text" name="email">
            </div>

            <button type="submit" class="btn btn-success">
                Add User
            </button>
        
        </form>
    </div>
    </div>


    



    
@endsection

