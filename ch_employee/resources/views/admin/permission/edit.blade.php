@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                
                <form action="{{ route('permissions.update', [$permission->id]) }}" method="post">@csrf
                    @method('PUT')
                    <div class="card">

                        <div class="card-header">Permission Update</div>

                        <div class="card-body">
                            <h3>{{ $permission->role->name }}</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Permission</th>
                                        <th scope="col">Can-Add</th>
                                        <th scope="col">Can-Edit</th>
                                        <th scope="col">Can-View</th>
                                        <th scope="col">Can-Delete</th>
                                        <th scope="col">Can-List</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td>Department</td>
                                        <td><input type="checkbox" name="name[department][can-add]" @if($permission['name']['department']['can-add'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-edit]" @if($permission['name']['department']['can-edit'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-view]" @if($permission['name']['department']['can-view'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-delete]" @if($permission['name']['department']['can-delete'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-list]" @if($permission['name']['department']['can-list'] ?? null) checked @endif value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td><input type="checkbox" name="name[role][can-add]" @if($permission['name']['role']['can-add'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-edit]" @if($permission['name']['role']['can-edit'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-view]" @if($permission['name']['role']['can-view'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-delete]" @if($permission['name']['role']['can-delete'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-list]" @if($permission['name']['role']['can-list'] ?? null) checked @endif value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>Permisstion</td>
                                        <td><input type="checkbox" name="name[permission][can-add]" @if($permission['name']['permission']['can-add'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-edit]" @if($permission['name']['permission']['can-edit'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-view]" @if($permission['name']['permission']['can-view'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-delete]" @if($permission['name']['permission']['can-delete'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-list]" @if($permission['name']['permission']['can-list'] ?? null) checked @endif value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>User</td>
                                        <td><input type="checkbox" name="name[user][can-add]" @if($permission['name']['user']['can-add'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-edit]" @if($permission['name']['user']['can-edit'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-view]" @if($permission['name']['user']['can-view'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-delete]" @if($permission['name']['user']['can-delete'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-list]" @if($permission['name']['user']['can-list'] ?? null) checked @endif value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>Notice</td>
                                        <td><input type="checkbox" name="name[notice][can-add]" @if($permission['name']['notice']['can-add'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[notice][can-edit]" @if($permission['name']['notice']['can-edit'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[notice][can-view]" @if($permission['name']['notice']['can-view'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[notice][can-delete]" @if($permission['name']['notice']['can-delete'] ?? null) checked @endif value="1"></td>
                                        <td><input type="checkbox" name="name[notice][can-list]" @if($permission['name']['notice']['can-list'] ?? null) checked @endif value="1"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="btn btn-dark" href="{{ route('permissions.index') }}" role="button">Back</a>
                            <button type="submit" class="btn btn-primary .move-right" style="float: right;">Update</button>                
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
