@extends('backend.layouts.master')
@section("title","Customer List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Seller List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Seller List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Seller Lists</h3>
                        <div class="float-right">
                            {{--<a href="{{route('admin.sellers.index.create')}}">
                                <button class="btn btn-success" >
                                    <i class="fa fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>--}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customerInfos as $key => $Info)

                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$Info->name}}</td>
                                    <td>{{$Info->phone}}</td>
                                    <td>{{$Info->email}}</td>

{{--                                    <td>--}}
{{--                                        <div class="form-group col-md-2">--}}
{{--                                            <label class="switch" style="margin-top:40px;">--}}
{{--                                                <input onchange="verification_status(this)" value="{{$Info->user->id }}" {{$Info->verification_status == 1? 'checked':''}} type="checkbox" >--}}
{{--                                                <span class="slider round"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>{{$Info->products->count()}}</td>--}}
{{--                                    <td>{{$sellerUserInfo->seller->admin_to_pay}}</td>--}}
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="bg-dark dropdown-item" href="{{route('admin.customers.profile.show',encrypt($Info->id))}}">
                                                    <i class="fa fa-user"></i> Profile
                                                </a>
{{--                                                <a class="bg-success dropdown-item" onclick="show_seller_payment_modal('{{$customerInfos->seller->id}}');" href="#">--}}
{{--                                                    <i class="fa fa-money"></i> Pay Now--}}
{{--                                                </a>--}}
{{--                                                <a class="bg-danger dropdown-item" onclick="show_seller_commission_modal('{{$customerInfos->seller->id}}');" href="#">--}}
{{--                                                    <i class="fa fa-money-bill-wave"></i> Set Commission--}}
{{--                                                </a>--}}
{{--                                                <a class="bg-secondary dropdown-item" href="{{route('admin.customers.edit',$Info->id)}}">--}}
{{--                                                    <i class="fa fa-history"></i> Payment History--}}
{{--                                                </a>--}}
{{--                                                <a class="bg-info dropdown-item" href="{{route('admin.customers.edit',$Info->id)}}">--}}
{{--                                                    <i class="fa fa-edit"></i> Edit--}}
{{--                                                </a>--}}
                                                <button class="bg-danger dropdown-item" type="button"
                                                        onclick="deleteProduct({{$Info->id}})">
                                                    <i class="fa fa-ban"></i> Ban this Customer
                                                </button>
                                                <form id="delete-form-{{$Info->id}}" action="{{route('admin.customers.destroy',$Info->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
{{--                                <th>Approval</th>--}}
{{--                                <th>Commission</th>--}}
{{--                                <th>Num. of Products</th>--}}
{{--                                <th>Due to seller</th>--}}
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal html start--}}
        <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content">

                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        //sweet alert
        function deleteBrand(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your Data is save :)',
                        'error'
                    )
                }
            })
        }

        function verification_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('admin.seller.verification') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    //toastr.success('success', 'Todays Deal updated successfully');
                }
                else{
                    //toastr.danger('danger', 'Something went wrong');
                }
            });
        }
        function show_seller_payment_modal(id){
            $.post('{{ route('admin.sellers.payment_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#payment_modal #modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});

            });
        }
        function show_seller_commission_modal(id){
            $.post('{{ route('admin.sellers.commission_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#payment_modal #modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});

            });
        }

    </script>
@endpush
