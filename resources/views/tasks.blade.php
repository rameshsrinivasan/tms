@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    <!-- New Task Form -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        <!-- Task Project -->
                        <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                            <label for="task-project" class="col-sm-3 control-label">Project</label>
                            <div class="col-sm-6">
                                {!! Form::select('project_id', $projects, old('project_id'), ['class' => 'form-control', 'id'=>'task-project'] ) !!}
                                @if ($errors->has('project_id')) <span class="help-block"><strong>{{ $errors->first('project_id') }}</strong></span> @endif
                            </div>
                        </div>
                        <!-- Task Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>
                            <div class="col-sm-6">
                                <textarea name="name" id="task-name" class="form-control">{{ old('name') }}</textarea>
                                @if ($errors->has('name')) <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span> @endif
                            </div>
                        </div>
                        <!-- Task Date -->
                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="task-project" class="col-sm-3 control-label">Date</label>
                            <div class="col-sm-6">
                                <input type="text" name="date" class="form-control" id="date_picker" value="{{ old('date') }}"/>
                                @if ($errors->has('date')) <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span> @endif
                            </div>
                        </div>
                        <!-- Task Time -->
                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="task-project" class="col-sm-3 control-label">Time</label>
                            <div class="col-sm-6">
                                <input type="text" name="time" class="form-control" id="time_picker" value="{{ old('time') }}" />
                                @if ($errors->has('time')) <span class="help-block"><strong>{{ $errors->first('time') }}</strong></span> @endif
                            </div>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('task_list')
        </div>
    </div>
@endsection
@section('script')
    {!! Html::script('assets/jquery.maskedinput.min.js') !!}
    <script type="text/javascript">
        $(function(){
            $("#date_picker").datepicker({ dateFormat: 'dd-mm-yy' });
            $("#time_picker").mask("99:99");
        });
    </script>
@endsection