@extends('layouts.app')

@section('content')

    <div class="panel-body">

        @include('common.errors')


        <form action="{{ url('skill') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Skill</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="skill-name" class="form-control">
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

 @if (count($skills) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Skills
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Skill name</th>
                        <th>Skill level</th>                      
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>

                                <td class="table-text">
                                    <div>{{ $skill->domain_id }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $skill->level_id }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- TODO: Current Skills -->
@endsection