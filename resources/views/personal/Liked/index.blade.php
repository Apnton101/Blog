@extends('personal.layouts.personal')

@section('content')
    <section class="content">
        <div class="container-fluid ">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="content-header col-12  ">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <h1 class="m-0">Liked</h1>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th class="text-center" colspan="3">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td class="text-center"><a
                                                        href="{{route('admin.post.show', $post->id)}}"><i
                                                            class="far fa-eye"></i></a></td>
                                                <td class="text-center">
                                                    <form action="{{route('personal.liked.delete', $post->id)}}"
                                                          method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('are you sure?')"
                                                                class="border-0 bg-transparent" type="submit">
                                                            <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
