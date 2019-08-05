@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Update Tags</h5>
        
        <form action="{{ route('tag.update' , $tags -> id) }}" method="post">
            @csrf
        @if (isset($tags))

        @method('PUT')
            
        @endif
        
        <div class="form-group">
            <label for="tag">Name</label>
            <input  class="form-control" type="text" name="tag" value="{{ $tags -> tag }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        
        
        
        </form>
    </div>
</div>
    
@endsection