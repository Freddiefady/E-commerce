@extends('layouts.dashboard.app')
@section('title', __('dashboard.countries'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Countries Table</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.countries.index')}}">{{__('dashboard.countries')}}</a>
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
                        <h4 class="card-title">{{__('dashboard.countries')}}</h4>
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
                                        <th>{{__('dashboard.phone_code')}}</th>
                                        <th>{{__('dashboard.num_of_gov')}}</th>
                                        <th>{{__('dashboard.num_of_user')}}</th>
                                        <th>{{__('dashboard.status')}}</th>
                                        <th>{{__('dashboard.status_management')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($countries as $country)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td><a href="{{route('dashboard.countries.gov.index', $country->id)}}">
                                            {{$country->name}} <i class="flag-icon flag-icon-{{$country->flag_icon}}"></i>
                                        </a></td>
                                        <td>
                                            <fieldset class="form-control position-relative has-icon-left">
                                                <input type="text" class="form-control" id="iconLeft" disabled
                                                    value="{{$country->phone_code}}">
                                                <div class="form-control-position">
                                                    <i class="ft-phone-call primary"></i>
                                                </div>
                                            </fieldset>
                                        </td>
                                        <td>
                                            <div class="badge badge-pill badge-border border-success success">
                                                {{$country->governorates->count()}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="badge badge-pill badge-border border-primary success">
                                                {{$country->users->count()}}
                                            </div>
                                        </td>
                                        <td>
                                            <div id="status_{{$country->id}}" class="badge badge-pill badge-border border-info success">
                                                {{$country->is_active}}
                                            </div>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="switch change_status" id="switch5"
                                                country-id="{{$country->id}}"
                                                @if ($country->is_active == 'Active' || $country->is_active == 'مفعل') checked @endif
                                            data-group-cls="btn-group-sm">
                                        </td>
                                        @empty
                                        <td colspan="4">{{__('dashboard.no_data')}}</td>
                                        @endforelse
                                    </tr>
                                </tbody>
                            </table>
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

        var id = $(this).attr('country-id');
        var url = "{{ route('dashboard.countries.change.status', ':id') }}";
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
@endpush
