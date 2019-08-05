@extends('layouts.app')


@section('content')

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Restore</th>
            <th>Permanent Delete</th>
          
        </tr>
    </thead>
    <tbody>

        {{-- Count Posts if no posts display messgae  --}}

        @if ($posts -> count() > 0 )

        {{-- Code  --}}
        @foreach ($posts as $Post)
 
        <tr>
                <td>
                    <img src="{{ $Post -> featured}}" alt="{{ $Post -> title }}" height="50px" width="90px">
                </td>
                <td>
                    {{ $Post ->  title }}
                </td>
                <td>
                    <a href="{{ route ('posts.restore' , $Post-> id) }}" class="btn btn-success a-btn-slide-text">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span><strong>Restore</strong></span>            
                    </a>
                </td>
                <td>
                    <a href="{{ route ('posts.kill' , $Post -> id) }}" class="btn btn-danger a-btn-slide-text">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                         <span><strong>Delete</strong></span>            
                     </a>
                </td> 
          </tr>

            
        @endforeach

        @else

        <tr>
           <td colspan="5" class="text-center">
               No trashed posts 
           </td>
        </tr>
            
        @endif
        
   
        
    </tbody>
</table>


    
@endsection