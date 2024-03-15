@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form action="{{route('departments.store')}}" method="post">@csrf
                <div class="card">
                    <div class="card-header"> Create New Department </div>

                        <div class="card-body">
                            <div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ ('Name') }}</label>
    
                                    <div class="col-md-7.7">
                                        <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ ('Description') }}</label>
    
                                    <div class="col-md-7.7">
                                        <textarea placeholder="Description" id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ old('description') }}</textarea>
    
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary"> Submit </button>
                            </div>
                            
                        </div>
                    </div>
            </form>

        </div>
    </div>
</div>

@endsection
