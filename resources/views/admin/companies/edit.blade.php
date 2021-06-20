@extends('layouts.admin.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Companies</h1>

            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-admin"></i> Admin</a></li>
                <li><a href="{{ route('admin.companies.index') }}">   <h1>Companies</h1></a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Edit</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('admin.companies.update', $company->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}">
                        </div>


                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $company->email }}">
                        </div>


                        <div class="form-group">
                            <label>Logo</label> <small class="text-danger">Must be at list 100 X 100</small>
                            <input type="file" name="logo" class="form-control logo" accept="image/*">
                        </div>

                        <div class="form-group">
                            <img src="{{ $company->logo_path  }}"   style="width: 100px" class="img-thumbnail image-preview" >
                        </div>


                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" value="{{ $company->website }}">
                        </div>





                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
