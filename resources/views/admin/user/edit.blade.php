@extends('admin.layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form class="w-25" action="{{route('admin.user.update', $user->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group ">
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{$user->name}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <input name="email" type="text" class="form-control" id="exampleInputEmail1" value="{{$user->email}}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{$id}}"
                                        {{$id == $user->role ? 'selected' : '' }}>{{$role}}

                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="alert text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary mb-3" value="Update">

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
