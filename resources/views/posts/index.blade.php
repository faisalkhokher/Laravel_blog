@extends('layouts.app')


@section('content')

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>CreatedBy</th>
            <th>Image</th>
            <th>Title</th>
            <th>Editing</th>
            <th>Recycle Bin</th>
        </tr>
    </thead>
    <tbody>

    @if ($posts -> count() > 0 )
        @foreach ($posts as $Post)
 
        <tr>
                <td>
                       {{ $Post -> user -> name }}
                    </td>
                <td>
                    <img src="{{ $Post -> featured}}" alt="{{ $Post -> title }}" height="50px" width="90px">
                </td>
                <td>
                    {{ $Post ->  title }}
                </td>
                <td>
                    <a href="{{ route ('posts.edit' , $Post -> id) }}" class="btn btn-success a-btn-slide-text">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span><strong>Edit</strong></span>            
                    </a>
                </td>
                <td>
                    <a href="{{ route ('posts.delete' , $Post -> id) }}" class="btn btn-warning a-btn-slide-text">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                         <span><strong>Trash</strong></span>            
                     </a>
                </td> 
          </tr>

            
        @endforeach

        @else

        <tr>
           <td colspan="5" class="text-center">
               No Posts 
           </td>
        </tr>
            
        @endif
        
   
        
    </tbody>
</table>


    
@endsection