@extends('layouts.dashboard.app')
@section('title', __('dashboard.products'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.product_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.Welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.products.index') }}">{{ __('dashboard.products') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('dashboard.product') }}</h4>
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
                        @livewire('dashboard.create-product', ['categories' => $categories, 'brands' => $brands])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/tags/tagging.css') }}">
    <link rel="stylesheet"  href="{{ asset('assets/dashboard/custom/product.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
@endpush
@push('js')
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('showFullscreenModal', () => {
            $('#fullscreenModal').modal('show');
        });
    });
</script>
@endpush
