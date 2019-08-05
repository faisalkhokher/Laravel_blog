@extends('layouts.app')


@section('content')

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Names</th>
             <th>Edit</th>
             <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @if ($tags -> count() > 0 )
        @foreach ($tags as $Tag)
        <tr>
            <td>
             {{ $Tag -> tag }}
            </td>
    
            <td>
                    <a href="{{ route ('tag.edit' , $Tag -> id) }}" class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span><strong>Edit</strong></span>            
                    </a>
                </td>
                <td>
                    <a href="{{ route ('tag.delete' , $Tag -> id) }}" class="btn btn-danger a-btn-slide-text">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                         <span><strong>Delete</strong></span>            
                     </a>
                </td>
        </tr>
    
    
        @endforeach
        @else 
        <tr>
            <td colspan="5" class="text-center">
                 No Tags
            </td>
        </tr>
        @endif
 
    </tbody>
</table>



    
@endsection