@extends('admin.layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create post</h1>
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
                    <form class="" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25 ">
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1"
                                   value="{{old('title')}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content">{{old('title')}}</textarea>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Preview input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="preview_image" type="file" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                    @error('preview_image')
                                    <div class="alert text-danger"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-25">
                            <label>Main input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="main_image" type="file" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-25">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{$category->id == old('category_id') ? 'selected' : ''}}
                                    >{{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <label>Tags</label>
                            <select name="tag_ids[]" class="select2 select2-hidden-accessible" multiple=""
                                    data-placeholder="Select a State" style="width: 100%;" data-select2-id="7"
                                    tabindex="-1" aria-hidden="true">
                                @foreach($tags as $tag)
                                    <option {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected': ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mb-3" value="Create">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
