@extends('layouts.app')

@section('content')

    <div class="panel-body">

        @include('common.errors')

        <form action="{{ url('skillupdate/'.$skill->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                
                <label for="skill-date" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-3">
                    <input type="text" name="date_recorded" id="skill-date" class="form-control js-datepicker" value="{{$skill->date_recorded}}">
                </div>
                
                <div>&nbsp;</div>                              
                <label for="skill-domain" class="col-sm-3 control-label">Domain</label>
                <div class="col-sm-3">                
                    <select name="domain" id="skill-domain" class="form-control">
                        <option value="0">-- Select a value --</option>
                        @foreach ($domains as $domain)
                            <option value="{{$domain->id}}" @if($skill->domain_id == $domain->id) {{ 'selected' }} @endif  >{{$domain->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>&nbsp;</div>
                <label for="skill-level" class="col-sm-3 control-label">Level</label>
                <div class="col-sm-3">                
                    <select name="level" id="skill-level" class="form-control" >
                        <option value="0">-- Select a value --</option>                        
                        @foreach ($levels as $level)
                            <option value="{{$level->id}}"  @if($skill->level_id == $level->id) {{ 'selected' }} @endif >{{$level->name}}</option>
                        @endforeach
                    </select>
                </div>               
                
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Skill
                    </button>
                </div>
            </div>
        </form>
    </div>



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
                                             weekHeader: 'Sem.'});
            });
        </script>   
    @endsection
    
@endsection