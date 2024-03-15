@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form action="{{ route('permissions.store') }}" method="post">@csrf
                    <div class="card">

                        <div class="card-header">Permission</div>

                        <div class="card-body">
                            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror"
                                id="">
                                <option value="">Select Role</option>
                                @foreach (App\Models\Role::all() as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
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
                                        <td><input type="checkbox" name="name[department][can-add]" value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-edit]" value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-view]" value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-delete]" value="1"></td>
                                        <td><input type="checkbox" name="name[department][can-list]" value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td><input type="checkbox" name="name[role][can-add]" value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-edit]" value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-view]" value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-delete]" value="1"></td>
                                        <td><input type="checkbox" name="name[role][can-list]" value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>Permisstion</td>
                                        <td><input type="checkbox" name="name[permission][can-add]" value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-edit]" value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-view]" value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-delete]" value="1"></td>
                                        <td><input type="checkbox" name="name[permission][can-list]" value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>User</td>
                                        <td><input type="checkbox" name="name[user][can-add]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-edit]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-view]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-delete]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-list]" value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>Notice</td>
                                        <td><input type="checkbox" name="name[user][can-add]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-edit]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-view]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-delete]" value="1"></td>
                                        <td><input type="checkbox" name="name[user][can-list]" value="1"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
