@extends('layouts.admin.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Admin Panel</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Admin Panel</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">



                {{--Companies--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ \App\Models\Company::count() }}</h3>

                            <p>Companies</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin.companies.index') }}" class="small-box-footer">More... <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>



                {{--Employees--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ \App\Models\Employee::count() }}</h3>

                            <p>Employees</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('admin.employees.index') }}" class="small-box-footer">More...<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div><!-- end of row -->


        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('scripts')



@endpush
