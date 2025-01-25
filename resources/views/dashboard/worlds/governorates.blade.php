@extends('layouts.dashboard.app')
@section('title', __('dashboard.governorates'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">governorates Table</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.countries.index')}}">{{__('dashboard.countries')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="">{{__('dashboard.governorates')}} & {{__('dashboard.shipping_management')}}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            @include('components.button-actions')
        </div>
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.governorates')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @include('components.tostar-success')
                            @include('components.tostar-error')

                            <form action="{{url()->current()}}" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="search" name="keyword" class="form-control" placeholder="{{__('dashboard.search')}}">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" id="search" class="btn btn-primary">{{__('dashboard.search')}}</button>
                                    </div>
                                </div><br>
                            </form>

                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('auth.name')}}</th>
                                        <th>{{__('dashboard.country')}}</th>
                                        <th>{{__('dashboard.num_of_cities')}}</th>
                                        <th>{{__('dashboard.num_of_user')}}</th>
                                        <th>{{__('dashboard.status')}}</th>
                                        <th>{{__('dashboard.status_management')}}</th>
                                        <th>{{__('dashboard.shipping_price')}}</th>
                                        <th>{{__('dashboard.change_price')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($governorates as $governorate)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$governorate->name}}</td>
                                        <td>
                                            {{$governorate->country->name}} <i class="flag-icon flag-icon-{{$governorate->country->flag_icon}}"></i>
                                        </td>
                                        <td>
                                            <div class="badge badge-pill badge-border border-success success">
                                                {{$governorate->cities->count()}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="badge badge-pill badge-border border-primary success">
                                                {{$governorate->users->count()}}
                                            </div>
                                        </td>
                                        <td>
                                            <div id="status_{{$governorate->id}}" class="badge badge-pill badge-border border-info success">
                                                {{$governorate->is_active}}
                                            </div>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="switch change_status" id="switch5"
                                                gov-id="{{$governorate->id}}"
                                                @if ($governorate->is_active == 'Active' || $governorate->is_active == 'مفعل') checked @endif
                                            data-group-cls="btn-group-sm">
                                        </td>
                                        <td>
                                            <div id="price_{{$governorate->id}}" class="badge badge-pill badge-border border-primary success">
                                                {{$governorate->shippingGoverno->price}}
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change_price_{{$governorate->id}}">
                                                {{__('dashboard.change_price')}}
                                            </button>
                                        </td>
                                        <!-- Modal -->
                                        @include('dashboard.worlds.charge')
                                    @empty
                                    <td colspan="4">{{__('dashboard.no_data')}}</td>
                                    @endforelse
                                </tbody>
                            </table>
                            {{$governorates->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>
</div>
@endsection
@push('js')
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('assets/dashboard')}}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{asset('assets/dashboard')}}/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('assets/dashboard')}}/js/scripts/tables/components/table-components.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script>
    $(document).on('change', '.change_status', function() {

        var id = $(this).attr('gov-id');
        var url = "{{ route('dashboard.governo.change.status', ':id') }}";
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'GET',

            success: function(response) {
                if (response.status == true) {
                    $('.tostar_success').text(response.message);
                    $('.tostar_success').show();
                    // change status
                    $('#status_' + response.data.id).empty();
                    $('#status_' + response.data.id).text(response.data.is_active);
                } else {
                    $(".tostar_error").show();
                    $(".tostar_error").text(data.message);
                }
                setTimeout(function() {
                    $('.tostar_success').hide();
                }, 5000);
            }
        });
    });
</script>
<script>
    $(document).on('submit', '.update_shipping_price', function (e) {
        e.preventDefault();

        data = new FormData($(this)[0]);
        var id = $(this).attr('gov-id');

        $.ajax({
            url: "{{ route('dashboard.governo.shipping.price') }}",
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == true) {
                    $('.tostar_success').text(response.message).show();
                    // change status
                    $('#price_' + response.data.id).empty();
                    $('#price_' + response.data.id).text(response.data.shipping_governo.price);
                }
            },
            error: function (data) {
                var response = $.parseJSON(data.responseText);
                $("#errors_" + id).text(response.errors.price).show();
            }
        });
    });
</script>
@endpush
