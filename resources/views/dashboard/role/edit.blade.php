@extends('dashboard.layout.master')
@section('content')

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{route('role.update',$role->id)}}">

            <div class="row">
                {{-- Role    --}}
                <div class="col-md-6">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
                        </div>
                </div>

                {{-- Permissions --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Permissions</label>
                        <select class="select2" name="permissions[]" multiple="multiple" data-placeholder="Select Permissions" style="width: 100%;">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}" {{ in_array($permission->name, $rolePermissions) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
            </form>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->

@endsection
