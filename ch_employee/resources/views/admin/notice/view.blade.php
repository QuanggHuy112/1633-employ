@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="alert alert-secondary">
                    All Notices
                </div>
                @if (count($notices) > 0)
                    @foreach ($notices as $notice)
                        <div class="card alert alert-info">
                            <div class="card-header alert alert-warning" style="color:black;">{{ $notice->title }}</div>

                            <div class="card-body" style="color:black;">
                                <p>{{ $notice->description }}</p>
                                <p class="badge rounded-pill bg-success">Data:{{ $notice->date }}</p>
                                <p class="badge rounded-pill bg-warning">Created By:{{ $notice->name }}</p>
                            </div>

                            <div class="card-footer">
                                {{-- Function Delete --}}
                                <td>
                                    {{-- permission --}}
                                    @if (isset(auth()->user()->role->permission['name']['notice']['can-delete']))

                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $notice->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>

                                    @endif
                                    {{-- end permission --}}
                                </td>
                                {{-- Delete end --}}

                                <span style="float: right;">
                                    {{-- fuction update --}}
                                    <td>
                                        @if (isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                                            <a href="{{ route('notices.edit', [$notice->id]) }}">
                                                <i class="fa-sharp fa-light fa-pen-to-square"></i>
                                            </a>
                                        @endif
                                    </td>
                                    {{-- Update end --}}

                                    {{-- Model alert --}}
                                    <div class="modal fade" id="exampleModal{{ $notice->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('notices.destroy', [$notice->id]) }}" method="post">
                                                @csrf
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
                                </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No notices created yet</p>
                @endif

            </div>
        </div>
    </div>
@endsection
