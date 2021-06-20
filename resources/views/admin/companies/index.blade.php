@extends('layouts.admin.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Companies</h1>

            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-admin"></i> Admin</a></li>
                <li class="active">Companies</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">Companies <small>{{ $companies->total() }}</small></h3>

                    <form action="{{ route('admin.companies.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('admin.companies.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($companies->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Logo</th>
                                <th> Website</th>
                                <th> Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($companies as $index=>$company)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email}}</td>
                                    <td><img src=" {{ $company->logo_path }} " width="100" height="100" /> </td>
                                    <td>{{ $company->website }}</td>

                                    <td>
                                            <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            </form><!-- end of form -->
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $companies->appends(request()->query())->links() }}

                    @else

                        <h2>No Data</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
