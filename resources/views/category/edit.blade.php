@extends('layouts.app')



@section('content')


    {{-- Make category Header --}}
    <div class="card card-default">

        <div class="card-header">
                 Category : {{ $categories-> name }}
            </div>

            {{-- Flash ERROR --}}
       
          @include('partials.error')
 
            <div class="card-body" >
        <form action="{{ route('cat.update' , $categories -> id) }}" method="post" >
        @csrf
        @if (isset ($categories))

              @method('PUT')
                  
              @endif
       
        
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name" placeholder="Enter name" value="{{ $categories -> name  }}">
        </div>

        <div class="form-group">
            <button class="btn btn-outline-success" type="submit">
                <span>Update</span>
            </button> 
        </div>

        </form>
    </div> 
</div>




@endsection