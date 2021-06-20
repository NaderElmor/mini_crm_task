@extends('layouts.admin.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Companies</h1>

            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-admin"></i> Admin</a></li>
                <li><a href="{{ route('admin.companies.index') }}">Companies </a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Add</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('admin.companies.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>



                        <div class="form-group">
                            <label>Logo</label> <small class="text-danger">Must be at list 100 X 100</small>
                            <input type="file" name="logo" class="form-control logo" accept="image/*">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('images/default_logo.png') }}"   style="width: 100px" class="img-thumbnail image-preview" >
                        </div>


                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
