@extends('layouts.app')

@section('content')

    <div class="panel-body">

        @include('common.errors')
        @include('skillset.searchform')
       
    </div>

<hr/>

 @if (count($skillset) > 0)
 
        <div class="panel panel-default">
            <div class="panel-heading"                
                 style ="color:#fff;background-color: #8abeb7;padding:10px;margin-top:10px;" >
                Search results:
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Skill Id</th>
                        <th>User name</th>
                        <th>Skill name</th>
                        <th>Skill level</th>    
                        <th>Date</th>  
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($skillset as $skill)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $skill->id}}</div>
                                </td>                                
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
                                    <div>{{ (new \DateTime($skill->date_recorded))->format("Y-m-d")}}</div>
                                </td>
                                
                                {{--<td>
                                
                                    <a href="{{url('skilledit/'.$skill->id) }}" class="btn btn-warning" style="color:#fff">
                                        <i class="fa fa-btn fa-edit"></i>Update
                                    </a>  

                                    <div>&nbsp;</div>
                                    
                                     <form action="{{ url('skilldelete/'.$skill->id) }}" method="POST">
                                        {{ csrf_field() }}


                                        <button type="submit" id="delete-task-{{ $skill->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>                                                                                                    
                                </td>--}}
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-danger col-md-3 text-center" >No results were found!</div>
    @endif
  
@endsection