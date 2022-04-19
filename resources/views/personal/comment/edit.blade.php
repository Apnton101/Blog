@extends('personal.layouts.personal')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="content-header col-12  ">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <h1 class="m-0">Comments</h1>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <form class="w-50" action="{{route('personal.comment.update', $comment->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group ">
                                    <textarea class="form-control" name="message" >{{$comment->message}}</textarea>
                                    @error('message')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-primary mb-3" value="Update">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection



