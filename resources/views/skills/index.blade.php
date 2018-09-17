@extends('layouts.app')

@section('content')

    <div class="panel-body">

        @include('common.errors')


        <form action="{{ url('skill/'.$user->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                
                <label for="skill-date" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-3">
                    <input type="text" name="date_recorded" id="skill-date" class="form-control js-datepicker">
                </div>
                
                <div>&nbsp;</div>                              
                <label for="skill-domain" class="col-sm-3 control-label">Domain</label>
                <div class="col-sm-3">                
                    <select name="domain" id="skill-domain" class="form-control">
                        <option value="0">-- Select a value --</option>
                        @foreach ($domains as $domain)
                            <option value="{{$domain->id}}">{{$domain->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>&nbsp;</div>
                <label for="skill-level" class="col-sm-3 control-label">Level</label>
                <div class="col-sm-3">                
                    <select name="level" id="skill-level" class="form-control">
                        <option value="0">-- Select a value --</option>                        
                        @foreach ($levels as $level)
                            <option value="{{$level->id}}">{{$level->name}}</option>
                        @endforeach
                    </select>
                </div>               
                
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Skill
                    </button>
                </div>
            </div>
        </form>
    </div>

<hr/>

 @if (count($skills) > 0)
 
        <div class="panel panel-default">
            <a href='{{ url('charts/'.$user->id) }}'                                  
               class="btn btn-block btn-warning btn-sm" 
               style ="width:200px;color:#fff; margin-top:10px;" 
            >View the chart for these skills</a>
        </div>
        <div>&nbsp;</div>
        
        <div class="panel panel-default">
            <div class="panel-heading"                
                 style ="color:#fff;background-color: #8abeb7;padding:10px;margin-top:10px;" >
                The current skills for {{$user->name}}
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
                                     <form action="{{ url('skilldelete/'.$skill->id) }}" method="POST">
                                        {{ csrf_field() }}


                                        <button type="submit" id="delete-task-{{ $skill->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
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
                //alert("ok");
                $(".js-datepicker").datepicker({firstDay: 1,
                                             dateFormat: "dd-mm-yy",
                                            // minDate: 0,
                                             beforeShowDay: $.datepicker.noWeekends,
                                             closeText: 'Close',
                                             prevText: 'Prev',
                                             nextText: 'Next',
                                             currentText: 'Today',
//                                             monthNames: ['January', 'February', 'Mars', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
//                                             monthNamesShort: ['Jan.', 'Feb.', 'Mars', 'April', 'May', 'June', 'July', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.'],
//                                             dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
//                                             dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
//                                             dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                                             weekHeader: 'Sem.'});
            });
        </script>   
    @endsection
    
@endsection