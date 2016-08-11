<!-- Tasks List-->
@if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Tasks List
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Date</th>
                    <th>Project</th>
                    <th>Task</th>
                    <th>Time</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text"><div>{{date('d F Y', strtotime($task->date)) }}</div></td>
                            <td class="table-text"><div>{{$projects[$task->project_id]}}</div></td>
                            <td class="table-text"><div>{{$task->name}}</div></td>
                            <td class="table-text"><div>{{$task->time}}</div></td>
                            <!-- Task Delete Button -->
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-danger remove_levels">
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