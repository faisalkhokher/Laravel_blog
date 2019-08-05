@extends('layouts.app')



@section('content')


    {{-- Make category Header --}}
    <div class="card card-default">

        <div class="card-header text-center">
                  <h4>  Create Posts </h4>
            </div>

            {{-- Flash ERROR --}}
       
          @include('partials.error')
 
            <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Inputs --}}
        
        <div class="form-group">
            <label for="title"><b> Titile </b></label>
            <input  class="form-control" type="text" name="title" placeholder="Enter title">
        </div>

        <div class="form-group">
            <label for="featured"><b> Featured Image </b></label>
            <input  class="form-control" type="file" name="featured">
        </div>

        <div class="form-group">
            <label for="category"><b> Select Category <b> </label>
            <select name="category_id" id="category" class="form-control">

                {{-- Redirect Category data --}}

                @foreach ($categories  as $Category)

                <option value="{{ $Category -> id }}">
                
                    {{ $Category -> name }}
                
                </option>
                    
                @endforeach



            </select>
        </div>

            <div class="form-group">
                    <label><b> You Can Select Multiple Tags </b></label>
             @foreach ($tags as $Tag)
                 <div class="form-check">
                   <label class="form-check-label">
                     <input type="checkbox" class="form-check-input" value="{{ $Tag -> id }}" name="tags[]">
                     {{ $Tag -> tag }}
                   </label>
                 </div>
             @endforeach
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control" name="content" rows="3"></textarea>
        </div>


        {{-- Store Button --}}

        <div class="form-group">
            <button class="bn" type="submit">
                <span>Store</span>
            </button>
        </div>

        </form>
    </div> 
</div>




@endsection
