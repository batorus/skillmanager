@extends('layouts.app')

@section('content')

    @if(session()->get('success'))
       <div class="alert alert-info">
         {{ session()->get('success') }}  
       </div><br />
    @endif
    
 @if (count($users) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                List of users: 
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>User name</th>
                        <th>User email</th>    
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <td class="table-text">
                                    <div>{{ $user->name}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $user->email}}</div>
                                </td>
                                <td>

                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning" style="color:#fff">
                                        <i class="fa fa-btn fa-edit"></i>Update
                                    </a> 
                                 
                                     <form action="{{route('users.delete', $user->id)}}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-danger" style="color:#fff">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>     
    
                                    <a href='{{url('skills/'.$user->id) }}' class="btn btn-primary" style="color:#fff">
                                       <i class="fa fa-btn fa-plus"></i> Add/View skill(s)
                                    </a>
                                     
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
  
@endsection