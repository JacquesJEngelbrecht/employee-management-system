@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('permissions.update', [$permission->id])}}" method="POST">@csrf
                {{method_field('PATCH')}}
                <div class="card">
                    <div class="card-header">{{ __('Permission') }}</div>

                    <div class="card-body">
                       <h3>{{$permission->role->name}}</h3>
                    <table class="table table-dark mt-5">
                        <thead>
                          <tr>
                            <th scope="col">Permission</th>
                            <th scope="col">Can-Add</th>
                            <th scope="col">Can-Edit</th>
                            <th scope="col">Can-View</th>
                            <th scope="col">Can-Delete</th>
                            <th scope="col">Can-List</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Department</th>
                            <td><input type="checkbox" name="name[department][can-add]" @if(isset($permission['name']['department']['can-add'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[department][can-edit]" @if(isset($permission['name']['department']['can-edit'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[department][can-view]" @if(isset($permission['name']['department']['can-view'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[department][can-delete]" @if(isset($permission['name']['department']['can-delete'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[department][can-list]" @if(isset($permission['name']['department']['can-list'])) checked @endif value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Role</th>
                            <td><input type="checkbox" name="name[role][can-add]" @if(isset($permission['name']['role']['can-add'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[role][can-edit]" @if(isset($permission['name']['role']['can-edit'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[role][can-view]" @if(isset($permission['name']['role']['can-view'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[role][can-delete]" @if(isset($permission['name']['role']['can-delete'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[role][can-list]" @if(isset($permission['name']['role']['can-list'])) checked @endif value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Permissions</th>
                            <td><input type="checkbox" name="name[permission][can-add]" @if(isset($permission['name']['permission']['can-add'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-edit]" @if(isset($permission['name']['permission']['can-edit'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-view]" @if(isset($permission['name']['permission']['can-view'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-delete]" @if(isset($permission['name']['permission']['can-delete'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-list]" @if(isset($permission['name']['permission']['can-list'])) checked @endif value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">User</th>
                            <td><input type="checkbox" name="name[user][can-add]" @if(isset($permission['name']['user']['can-add'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[user][can-edit]" @if(isset($permission['name']['user']['can-edit'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[user][can-view]" @if(isset($permission['name']['user']['can-view'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[user][can-delete]" @if(isset($permission['name']['user']['can-delete'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[user][can-list]" @if(isset($permission['name']['user']['can-list'])) checked @endif value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Notice</th>
                            <td><input type="checkbox" name="name[notice][can-add]" @if(isset($permission['name']['notice']['can-add'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-edit]" @if(isset($permission['name']['notice']['can-edit'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-view]" @if(isset($permission['name']['notice']['can-view'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-delete]" @if(isset($permission['name']['notice']['can-delete'])) checked @endif value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-list]" @if(isset($permission['name']['notice']['can-list'])) checked @endif value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Leave</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="name[leave][can-list]" @if(isset($permission['name']['leave']['can-list'])) checked @endif value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Mail</th>
                            <td><input type="checkbox" name="name[mail][can-add]" @if(isset($permission['name']['mail']['can-add'])) checked @endif value="1"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                    @if(isset(auth()->user()->role->permission['name']['permission']['can-edit']))
                    <button type="submit" class="btn btn-primary">Update</button>  
                    @endif
                <a href="{{route('permissions.index')}}" class="float-right">Back</a>            
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
