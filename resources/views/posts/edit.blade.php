@extends('layouts.app')



@section('content')


    {{-- Make category Header --}}
    <div class="card card-default">

        <div class="card-header">
                    Update Posts
            </div>

            {{-- Flash ERROR --}}
       
          @include('partials.error')
 
            <div class="card-body">
        <form action="{{ route('posts.update' , $posts -> id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset ($posts))

        @method('PUT')
            
        @endif

        {{-- Inputs --}}
        
        <div class="form-group">
            <label for="title">Titile</label>
            <input  class="form-control" type="text" name="title" placeholder="Enter title" value="{{ $posts -> title }}">
        </div>

        <div class="form-group">
            <label for="featured">Featured Image</label>
            <input  class="form-control" type="file" name="featured">
        </div>

        <div class="form-group">
            <label for="category">Select Category</label>
            <select name="category_id" id="category" class="form-control">

                {{-- Redirect Category data --}}

                @foreach ($categories  as $Category)

                <option value="{{ $Category -> id }}"
                    
                    {{-- View selected data in edit page  --}}
                    @if ($Category -> id == $posts -> category_id)
                    selected    
                    @endif
                    
                    
                    >
                
                    {{ $Category -> name }}
                
                </option>
                    
                @endforeach



            </select>
        </div>

        {{-- Tags Rel --}}
        <div class="form-group">
                <label><b> Select Tags </b></label>
         @foreach ($tags as $Tag)
             <div class="form-check">
               
                 <input type="checkbox" class="form-check-input" value="{{ $Tag -> id }}" name="tags[]"
                 
                 @foreach ($posts -> tags as $t)

                 @if ($Tag -> id == $t -> id)
                     checked
                 @endif
                     
                 @endforeach
                 
                 
                 >
                 {{ $Tag -> tag }}
               </label>
             </div>
         @endforeach
    </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control" name="content" rows="3"> {{ $posts -> content }}
            </textarea>
        </div>


        {{-- Store Button --}}

        <div class="form-group">
            <button class="bn" type="submit">
                <span>Update</span>
            </button>
        </div>

        </form>
    </div> 
</div>




@endsection

