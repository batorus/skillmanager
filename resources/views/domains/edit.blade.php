@extends('layouts.app')

@section('content')
  <div class="panel-body">

        @include('common.errors')
        
         @if(session()->get('error'))
            <div class="alert alert-danger">
              {{ session()->get('error') }}  
            </div><br />
         @endif

        <form action="{{route('domains.update', $domain->id)}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                
                <label  class="col-sm-3 control-label">Domain Name</label>
                <div class="col-sm-3">
                    <input type="text" name="name" id="skill-date" class="form-control" value="{{$domain->name}}">
                </div>
               
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Edit Domain
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
