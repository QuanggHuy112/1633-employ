@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

                <form action="{{ route('leaves.update',[$leave->id]) }}" method="post">@csrf
                    {{method_field('PATCH')}}
                    <div class="card">
                        <div class="card-header"> Create New Leave </div>

                        <div class="card-body">
                            <div>

                                <div class="form-group">
                                    <label>Form Date</label>
                                    <input type="date" name="from"
                                        class="form-control @error('from') is-invalid @enderror" required="" value="{{ $leave->from }}">

                                    {{-- form validation First Name --}}
                                    @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- End Form Validate First Name --}}
                                </div>

                            </div>

                            <div>

                                <div class="form-group">
                                    <label>To Date</label>
                                    <input type="date" name="to"
                                        class="form-control @error('to') is-invalid @enderror" required="" value="{{ $leave->to }}">

                                    {{-- form validation First Name --}}
                                    @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- End Form Validate First Name --}}
                                </div>

                            </div>

                            <div>

                                <div class="form-group">
                                    <label>Type Of Leave</label>
                                    <select class="form-control" name="type">
                                        <option value="annualleave">Annual Leave</option>
                                        <option value="sickleave">Sick Leave</option>
                                        <option value="parental">Parental Leave</option>
                                        <option value="other">Other Leave</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mt-4">
                                <div class="form-group row">
                                    <label>Description</label>
                                    <textarea name="description"  cols="30" rows="10" class="form-control">{{ $leave->description }}</textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary"> Update </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
