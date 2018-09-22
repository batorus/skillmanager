<form action="{{ url('searchskillset') }}" method="POST" class="form-horizontal">
     {{ csrf_field() }}

     <div class="form-group">

         <label for="skill-date" class="col-sm-3 control-label"> Start Date</label>
         <div class="col-sm-3">
             <input type="text" name="startDate" id="skill-datestart" class="form-control" value="">
         </div>
         
         <div>&nbsp;</div>  
         <label for="skill-date" class="col-sm-3 control-label"> End Date</label>         
         <div class="col-sm-3">
             <input type="text" name="endDate" id="skill-dateend" class="form-control" value="">
         </div>
         
         <div>&nbsp;</div>            
         <label for="skill-domain" class="col-sm-3 control-label">Domain</label>
         <div class="col-sm-3">                
             <select name="domain" id="skill-domain" class="form-control">
                 <option value="0">-- Select a value --</option>
                 @foreach ($domains as $domain)
                     <option value="{{$domain->id}}" >{{$domain->name}}</option>
                 @endforeach
             </select>
         </div>

         <div>&nbsp;</div>
         <label for="skill-level" class="col-sm-3 control-label">Level</label>
         <div class="col-sm-3">                
             <select name="level" id="skill-level" class="form-control" >
                 <option value="0">-- Select a value --</option>                        
                 @foreach ($levels as $level)
                     <option value="{{$level->id}}"  >{{$level->name}}</option>
                 @endforeach
             </select>
         </div>               

     </div>

     <!-- Add Task Button -->
     <div class="form-group">
         <div class="col-sm-offset-3 col-sm-6">
             <button type="submit" class="btn btn-default">
                 <i class="fa fa-plus"></i> Search Skills
             </button>
         </div>
     </div>
 </form>

    @section('javascripts')
      @parent
        <script type="text/javascript">
            $( document ).ready(function() {
                //alert("ok");
                $("#skill-datestart, #skill-dateend").datepicker({firstDay: 1,
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