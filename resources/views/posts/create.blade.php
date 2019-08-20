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
            <label for="title"><b> Title </b></label>
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

            {{-- <div class="form-group">
                    <label><b> You Can Select Multiple Tags </b></label>
             @foreach ($tags as $Tag)
                 <div class="form-check">
                   <label class="form-check-label">
                     <input type="checkbox" class="form-check-input" value="{{ $Tag -> id }}" name="tags[]">
                     {{ $Tag -> tag }}
                   </label>
                 </div>
             @endforeach
        </div> --}}

        <div class="form-group">

                <label for="my-input">Select One Or Multiple Tags</label>
      
                <select  class="form-control tags-selector" name="tags[]" id="tags" multiple>
        
                  @foreach ($tags as $Tag)
                   
      
                     <option value="{{ $Tag -> id }}">
       
                      {{ $Tag -> tag }}
      
                    </option>
                         
                  @endforeach
      
                </select>
      
              </div>
    

              <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
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


{{-- External LLinks of current page  --}}

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>





{{-- Logic --}}
<script>

$(document).ready(function() {
    $('.tags-selector').select2();
})


$(document).ready(function() {
            $('#content').summernote();
      });

</script>



{{-- End of Scrip  --}}
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

{{-- Summernotes --}}

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">



@endsection