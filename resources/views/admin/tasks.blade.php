@extends('layouts.master')

@section('title')
    Tasks
@endsection

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Task</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/save-task" methode="POST">
        {{csrf_field()}}
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" name="descriptrion" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="prize-text" class="col-form-label">Prize:</label>
            <input class="form-control" name="prize" id="message-text"></input>
          </div>
      </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Task</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New Task</button>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>id</th>
                      <th>Name</th>
                      <th>Decription</th>
                      <th>Prize</th>
                    </thead>
                    <tbody>
                      @foreach ($tasks as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->Name}}</td>
                        <td>{{$data->Description}}</td>
                        <td>{{$data->prize}}</td>
                        <td class="text-right"></td>
                        <td>
                            <a href="{{url('tasks/'.$data->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="{{url('/task-del/'.$data->id)}}" method="POST">
                            {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submite" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('scripts')

@endsection