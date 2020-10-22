@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Edit Leave Form
                    
                </li>
              </ol>
            </nav>
        <form action="{{route('leaves.update',[$leave->id])}}" method="post" enctype="multipart/form-data">@csrf
            {{method_field('PATCh')}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
            <div class="card">
                <div class="card-header">Edit Leave</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>From</label>
                        <input type="text" id="fromDate" name="from" class="form-control 
                    @error('from') is-invalid @enderror" required="" value="{{$leave->from}}">
                        @error('from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>To</label>
                        <input type="text" id="toDate" name="to" class="form-control 
                        @error('to') is-invalid @enderror" required="" value="{{$leave->to}}">
                        @error('to')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Type of leave</label>
                        <select class="form-control" name="type">
                            <option value="annualleave">Annual Leave</option>
                            <option value="sickleave">Sick Leave</option>
                            <option value="parentalleave">Parental Leave</option>
                            <option value="otherleave">Other Leave</option>
                        </select>                        
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{$leave->description}}</textarea>
                    </div>                    
                </div>
                <div class="form-group ml-3">
                    <button class="btn btn-primary " type="submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
       
</div>
    
@endsection
