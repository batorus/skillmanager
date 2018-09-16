@extends('layouts.app')

@section('content')

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

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


    
@endsection