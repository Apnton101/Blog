@extends('admin.layouts.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-4">{{$user->name}}</h1>
                    <a class="text-success" href="{{route('admin.user.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                    <form class="" action="{{route('admin.user.delete', $user->id)}}"
                          method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('are you sure?')" class="border-0 bg-transparent" type="submit">
                            <i class="fas fa-trash-alt text-danger" role="button"></i>
                        </button>
                    </form>
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
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">

                                <tbody class="text-center">
                                <tr>
                                    <td>ID</td>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$user->name}}</td>

                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$user->email}}</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
