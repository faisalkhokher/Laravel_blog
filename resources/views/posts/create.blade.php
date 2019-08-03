@extends('layouts.app')


@section('content')

    {{-- Make category Header --}}
    <div class="card card-default">

        <div class="card-header">
                    Create Posts
            </div>

            <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Titile</label>
            <input  class="form-control" type="text" name="title" placeholder="Enter title">
        </div>

        <div class="form-group">
            <label for="featured">Featured Image</label>
            <input  class="form-control" type="file" name="featured">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control" name="content" rows="3"></textarea>
        </div>

        <div class="form-group">
            <button class="bn" type="submit">
                <span>Store</span>
            </button>
        </div>

        </form>
    </div> 
</div>




@endsection