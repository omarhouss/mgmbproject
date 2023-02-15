@extends('layouts.master')

@section('title')
    Edit Task
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Task</h1>
                </div>
                <div class="card-body">
                    <form action="/task-update/{{$tasks->id}}" method="POST">
                    {{csrf_field()}}    
                    {{ method_field('PUT')}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $tasks->Name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" value="{{ $tasks->Description}}" class="form-control">{{ $tasks->Description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>prize</label>
                            <input type="text" name="prize" value="{{$tasks->prize}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success"> Update</button>
                        <a href="/" class="btn btn-success"> Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

