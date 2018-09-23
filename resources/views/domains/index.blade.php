@extends('layouts.app')

@section('content')

    @if(session()->get('success'))
       <div class="alert alert-info">
         {{ session()->get('success') }}  
       </div><br />
    @endif
    
 @if (count($domains) > 0)
        <div class="panel panel-default">
            
            <div class="col col-sm-2">
                <a href="{{route('domains.new')}}" class="btn btn-primary" style="color:#fff">
                    <i class="fa fa-btn fa-plus"></i> Add new
                </a> 
            </div>            
            <hr/>
            
            <div class="panel-heading">
                List of domains: 
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Id</th> 
                        <th>Domain name</th> 
                        <th>Actions</th>                           
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($domains as $domain)
                            <tr>
                                <td class="table-text">
                                    <div>{{$domain->id}}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{$domain->name}}</div>
                                </td>

                                <td>
                                  <div class="container">    
                                    <div class="row">
                                        <div class="col col-sm-2">
                                            <a href="{{route('domains.edit', $domain->id)}}" class="btn btn-warning" style="color:#fff">
                                                <i class="fa fa-btn fa-edit"></i>Update
                                            </a> 
                                        </div>
                                        <div class="col col-sm-2">                             
                                             <form action="{{route('domains.delete', $domain->id)}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="delete-user-{{ $domain->id }}" class="btn btn-danger" style="color:#fff">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form> 
                                        </div>                                    

                                   </div>        
                                </div>                                       
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           @include('pagination.default', ['paginator' => $domains])
        </div>
    @endif
  
@endsection