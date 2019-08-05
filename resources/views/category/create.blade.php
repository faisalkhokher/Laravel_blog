@extends('layouts.app')



@section('content')


    {{-- Make category Header --}}
    <div class="card card-default">

        <div class="card-header">
                    Create a new category
            </div>

            {{-- Flash ERROR --}}
       
          @include('partials.error')
 
            <div class="card-body">
        <form action="{{ route('cat.store') }}" method="post" >
        @csrf
        
        <div class="form-group">
            <label for="name">Name</label>
            <input  class="form-control" type="text" name="name" placeholder="Enter name">
        </div>

        <div class="form-group" >
            <button class="btn btn-outline-success" type="submit">
                <span>Store</span>
            </button>
        </div>

        </form>
    </div> 
</div>




@endsection