@extends('layouts.app')


@section('content')

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Premissions</th>
            <th>Delete</th>
            <th>Online-Status</th>

        </tr>
    </thead>
    <tbody>

    @if ($users -> count() > 0 )
        @foreach ($users as $User)
 
        <tr>
                <td>
                     {{ $User -> id }}
                    </td>
                <td>
                    <img src="{{ url ('uploads/avaters/1.jpg') }}"  height="60px" width="60px" style="border-radius: 50%;">
                </td>
                <td>
                   {{ $User -> name }}
                </td>
                <td>
                    {{ $User -> email }}
                 </td>
                 
                <td>
                    @if ($User -> admin)

                    <a href="{{ route('user.not.admin' , $User -> id ) }}" class="btn btn-danger btn-sm">Remove Premission</a>

                    @else
                       <a href="{{ route('user.admin' , $User -> id ) }}" class="btn btn-success btn-sm">Make Admin</a>
                    @endif
                </td> 
                <td>
                
                        <a href="{{ route ('user.delete' , $User -> id) }}" class="btn btn-danger a-btn-slide-text">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                             <span><strong>Delete</strong></span>            
                         </a>
                         
                 </td> 
 
                 <td>

                    {{--  --}}
                        @if ($User -> isOnline())


                        <div class="spinner-grow text-success" role="status">
                                <span class="sr-only">Loading...</span>
                              
                        </div>
                        <b> ONLINE </b>
                        
                        @else 
    
                        <div class="spinner-grow text-danger" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                        <b> OFFLINE</b>
                        @endif
                 </td>
          </tr>

            
        @endforeach

        @else

        <tr>
           <td colspan="5" class="text-center">
               No User Found . . .  
           </td>
        </tr>
            
        @endif
        
   
        
    </tbody>
</table>


    
@endsection