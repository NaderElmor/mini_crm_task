@extends('layouts.admin.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Employees</h1>

            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-admin"></i> Admin</a></li>
                <li class="active">Employees</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">Employees <small>{{ $employees->total() }}</small></h3>

                    <form action="{{ route('admin.employees.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('admin.employees.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($employees->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th> Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($employees as $index=>$employee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name}}</td>
                                    <td>{{ $employee->email}}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->website }}</td>

                                    <td>
                                            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            </form><!-- end of form -->
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $employees->appends(request()->query())->links() }}

                    @else

                        <h2>No Data</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
