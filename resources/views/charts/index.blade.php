@extends('layouts.app')

@section('content')

    <div class="panel-body">

       

 @if (count($skills) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Skills
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>User name</th>
                        <th>Skill name</th>
                        <th>Skill level</th>    
                        <th>Date</th>  
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $skill->username}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $skill->namedomain }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $skill->namelevel }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $skill->date_recorded}}</div>
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

    @section('javascripts')
      @parent
        <script type="text/javascript">
            $( document ).ready(function() {

            });
        </script>   
    @endsection
    
@endsection