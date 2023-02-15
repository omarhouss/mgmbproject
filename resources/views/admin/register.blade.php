@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Users</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/add-user" methode="POST">
        {{csrf_field()}}
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">email:</label>
            <input type="text" name="email" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="prize-text" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="message-text"></input>
          </div>
          <div class= "mb-3">
          <label for="prize-text" class="col-form-label">UserType:</label>
          <select name="usertype">
              <option value="admin">Admin</option>
              <option value="user">User</option>
          </select>
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
                <h4 class="card-title"> Users</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Users</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>id</th>
                      <th>Name</th>
                      <th>Mail</th>
                      <th>userType</th>
                    </thead>
                    <tbody>
                    @foreach ($users as $row)
                      <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->usertype}}</td>
                        <td class="text-right"></td>
                        <td>
                            <a href="/role-edit/{{$row->id}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="/role-del/{{$row->id}}" method="POST">
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