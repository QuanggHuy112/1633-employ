@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <form action="{{route('notices.update', [$notice->id])}}" method="post">@csrf
                @method('PUT')
            <div class="card">
                <div class="card-header">Update  Notice</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>{{ ('Title') }}</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $notice->title }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label>{{ ('Description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"  name="description">{{ $notice->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label>{{ ('From date') }}</label>
                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" required="" value="{{ $notice->date }}">
                         @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                    <div class="form-group mt-4">
                        <label>Created By</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required="" value="{{auth()->user()->name}}">
                         @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
