@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Leave</div>

                    <div class="card-body">
                        <table class="table mt-5" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date from</th>
                                    <th scope="col">Date To</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">type</th>
                                    <th scope="col">Reply</th>
                                    <th scope="col">Status</th>

                                    <th scope="col">Approve/Reject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                    <tr>
                                        <td> {{ $leave->user->name }}</td>
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
                                                Approve/Reject
                                            </a>
                                        </td>
                                        {{-- Delete end --}}

                                        {{-- Model alert --}}
                                        <div class="modal fade" id="exampleModal{{ $leave->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('accept.reject', [$leave->id]) }}" method="post">
                                                    @csrf

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hey Bro</h1>

                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"> 
                                                                <span aria-hidden="true">&times;</span> 
                                                            </button>

                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-control" name="status" required="">
                                                                    <option value="0">Pending</option>
                                                                    <option value="1">Accept</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <textarea name="message" class="form-control" required=""></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Submit</button>
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
