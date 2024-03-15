@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-11 ms-5">
                <div class="col-md-12">
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="alert alert-secondary">
                        Permission List
                    </div>

                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($permissions) > 0)
                                @foreach ($permissions as $key => $permission)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> {{ $permission->role->name }} </td>

                                        {{-- Function Delete --}}
                                        <td>
                                            @if(isset(auth()->user()->role->permission['name']['permission']['can-delete']))
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$permission->id}}">
                                                <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            @endif
                                        </td>
                                        {{-- Delete end --}}

                                        {{-- Model alert --}}
                                        <div class="modal fade" id="exampleModal{{$permission->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('permissions.destroy',[$permission->id]) }}" method="post">@csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hey Bro</h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                                                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Cancel</button>
                                                        </div>
                                                      </div>
                                                </form>
                                            </div>
                                          </div>
                                        
                                        {{-- fuction update --}}
                                        <td>
                                            @if(isset(auth()->user()->role->permission['name']['permission']['can-edit']))
                                                <a href="{{ route('permissions.edit',[$permission->id]) }}"> 
                                                    <i class="fa-sharp fa-light fa-file-pen"></i> 
                                                </a>
                                            @endif
                                        </td>
                                        {{-- Update end --}}
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
    </div>
@endsection
