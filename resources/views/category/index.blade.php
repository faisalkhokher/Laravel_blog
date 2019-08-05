@extends('layouts.app')


@section('content')

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Category</th>
            <th>Editing</th>
            <th>Deleting</th>
        </tr>
    </thead>
    <tbody>
        
          @foreach ($categories as $Category)
              <tr>
                    <td>
                        {{ $Category ->  name }}
                    </td>
                    <td>
                        <a href="{{ route ('cat.edit', $Category -> id) }}" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span>            
                        </a>
                    </td>
                    <td>
                        <a href="{{ route ('cat.delete' , $Category -> id) }}" class="btn btn-danger a-btn-slide-text">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                             <span><strong>Delete</strong></span>            
                         </a>
                    </td>
              </tr>
          @endforeach
        
    </tbody>
</table>


    
@endsection