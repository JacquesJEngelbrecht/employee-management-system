@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <form action="{{route('notices.update',[$notice->id])}}" method="POST">@csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header">{{ __('Update Notice') }}</div>
                        <div class="card-body">
                            <div class="form-group ">
                                <label>Title</label>
                            <input value="{{$notice->title}}" type="text" name="title" class="form-control
                                 @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control 
                                @error('description') is-invalid @enderror">{{$notice->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>From</label>
                                <input value="{{$notice->date}}" type="" id="fromDate" name="date" class="form-control @error('date') is-invalid @enderror" required="">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Created By</label>
                            <input value="{{$notice->name}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" required="">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                @if(isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                                <button type="submit" class="btn btn-primary">Update</button>
                                @endif
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
