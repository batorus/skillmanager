@extends('layouts.app')

@section('content')
  <div class="panel-body">

        @include('common.errors')
        
         @if(session()->get('error'))
            <div class="alert alert-danger">
              {{ session()->get('error') }}  
            </div><br />
         @endif

        <form action="{{ url('domains/create') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                
                <label  class="col-sm-3 control-label">Domain Name</label>
                <div class="col-sm-3">
                    <input type="text" name="name" id="" class="form-control" value="{{old('name')}}">
                </div>
                                   
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Domain
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
