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
            <form action="{{route('permissions.store')}}" method="POST">@csrf
                <div class="card">
                    <div class="card-header">{{ __('Permission') }}</div>

                    <div class="card-body">
                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                        <option value="">Select Role</option>
                        @foreach(App\Role::all() as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                    @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </select>
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
                            <td><input type="checkbox" name="name[department][can-add]" value="1"></td>
                            <td><input type="checkbox" name="name[department][can-edit]" value="1"></td>
                            <td><input type="checkbox" name="name[department][can-view]" value="1"></td>
                            <td><input type="checkbox" name="name[department][can-delete]" value="1"></td>
                            <td><input type="checkbox" name="name[department][can-list]" value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Role</th>
                            <td><input type="checkbox" name="name[role][can-add]" value="1"></td>
                            <td><input type="checkbox" name="name[role][can-edit]" value="1"></td>
                            <td><input type="checkbox" name="name[role][can-view]" value="1"></td>
                            <td><input type="checkbox" name="name[role][can-delete]" value="1"></td>
                            <td><input type="checkbox" name="name[role][can-list]" value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Permissions</th>
                            <td><input type="checkbox" name="name[permission][can-add]" value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-edit]" value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-view]" value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-delete]" value="1"></td>
                            <td><input type="checkbox" name="name[permission][can-list]" value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">User</th>
                            <td><input type="checkbox" name="name[user][can-add]" value="1"></td>
                            <td><input type="checkbox" name="name[user][can-edit]" value="1"></td>
                            <td><input type="checkbox" name="name[user][can-view]" value="1"></td>
                            <td><input type="checkbox" name="name[user][can-delete]" value="1"></td>
                            <td><input type="checkbox" name="name[user][can-list]" value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Notice</th>
                            <td><input type="checkbox" name="name[notice][can-add]" value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-edit]" value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-view]" value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-delete]" value="1"></td>
                            <td><input type="checkbox" name="name[notice][can-list]" value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Approve Leave</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="name[leave][can-list]" value="1"></td>
                          </tr>
                          <tr>
                            <th scope="row">Mails</th>
                            <td><input type="checkbox" name="name[mail][can-add]" value="1"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>                            
                          </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Submit</button>
                                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
