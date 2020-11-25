@extends('backend.layouts.master')
@section("title","Roles")
@push('css')

@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
            <!-- general form elements -->
                <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title float-left">Add Roles</h3>
                    <div class="float-right">
                        <a href="{{route('admin.roles.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.roles.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Role Name">
                        </div>
                        <div class="form-group">
                            <h3>Permissions</h3><br>
                            <ul>
                                @foreach($permission as $per)
                                <li>
                                    <label for="permission">
                                        <input type="checkbox" class="checkbox" name="permission[]" id="permission" value="{{$per->id}}"> {{$per->name}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>

@stop
@push('js')

@endpush
