@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create Tags </h5>

        {{-- Form --}}

        <form action="{{ route ('tag.store') }}" method="post">
        {{ csrf_field() }}





        <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
                <div class="card-header">Danger tags and lockout-tagout are vital</div>
                <div class="card-body">
                  <h4 class="card-title">Importance of danger tags</h4>
                  <p class="card-text">Danger tags come in many colors and variations depending on where they need to be used.So , add <h6> # </h6> before craete a Tag </p>
                </div>
              </div>


            <div class="form-group">
                @include('partials.error')
                <label for="tag">Name</label>
                <input  class="form-control" type="text" name="tag">
                 
            </div>


            

            <button type="submit" class="btn btn-success">Store</button>
        
        
        
        
        
        
        </form>


        
    </div>
</div>

    
@endsection