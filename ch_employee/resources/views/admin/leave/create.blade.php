@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form action="{{ route('leaves.store') }}" method="post">@csrf
                    <div class="card">
                        <div class="card-header"> Create New Leave </div>

                        <div class="card-body">
                            <div>

                                <div class="form-group">
                                    <label>Form Date</label>
                                    <input type="date" name="from"
                                        class="form-control @error('from') is-invalid @enderror" required="">

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
                                        class="form-control @error('to') is-invalid @enderror" required="">

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
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-right">{{ 'Description' }}</label>

                                    <div class="col-md-7.7">
                                        <textarea placeholder="Description" id="description" class="form-control @error('description') is-invalid @enderror"
                                            name="description" rows="6" required>{{ old('description') }}</textarea>

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

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date from</th>
                            <th scope="col">Date To</th>
                            <th scope="col">Description</th>
                            <th scope="col">type</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $leave->from }}</td>
                                <td>{{ $leave->to }}</td>
                                <td>{{ $leave->description }}</td>
                                <td>{{ $leave->type }}</td>
                                <td>{{ $leave->message }}</td>
                                <td>
                                    @if ($leave->status == 0)
                                        <span class="btn btn-outline-danger">pending</span>
                                    @else
                                        <span class="btn btn-outline-success">Approved</span>
                                    @endif
                                </td>

                                {{-- Function Delete --}}
                                <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $leave->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                </td>
                                {{-- Delete end --}}

                                {{-- Model alert --}}
                                <div class="modal fade" id="exampleModal{{ $leave->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('leaves.destroy', [$leave->id]) }}"
                                            method="post">@csrf
                                            {{ method_field('DELETE') }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hey Bro</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Delete</button>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                 {{-- fuction update --}}
                                 <td>
                                        <a href="{{ route('leaves.edit', [$leave->id]) }}">
                                            <i class="fa-sharp fa-light fa-pen-to-square"></i>
                                        </a>
                                </td>
                                {{-- Update end --}}

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
