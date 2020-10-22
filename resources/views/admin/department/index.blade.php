@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user fa-fw"></i>&nbsp;All Departments</li>
                </ol>
              </nav>
              @if(Session::has('message'))
              <div class="alert alert-success">
                  {{Session::get('message')}}
              </div>
          @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                   
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @if(count($departments) > 0)
                    @foreach($departments as $key => $department)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$department->name}}</td>
                        <td>{{$department->description}}</td>
                        <td>
                            @if(isset(auth()->user()->role->permission['name']['department']['can-edit']))
                        <a href="{{route('departments.edit',[$department->id])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endif
                        </td>
                        <td>
                            @if(isset(auth()->user()->role->permission['name']['department']['can-delete']))
                            <a href="" data-toggle="modal" data-target="#exampleModal{{$department->id}}">
                                <i class="fas fa-trash"></i>
                            </a>
                            @endif
                        </td>
                            <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$department->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form action="{{route('departments.destroy',[$department->id])}}" method="POST">@csrf
                                        {{method_field('DELETE')}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Do you want to delete?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                                    </form>
                                </div>
                            </div>
                        </td>                        
                    </tr>
                    @endforeach
                    @else 
                    <td>No departments to display</td>
                    @endif
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection