<div class="content-header-right col-md-6 col-12">
    <div class="dropdown float-md-right">
        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton" type="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
            <a class="dropdown-item" href="{{route('dashboard.brands.edit', $brand->id)}}"><i
                    class="la la-edit"></i> {{__('dashboard.edit')}}</a>
            <a class="dropdown-item" href="{{route('dashboard.brands.change.status', $brand->id)}}">
                <i class="la @if ($brand->status == "Active") la-eye-slash @else la-eye @endif "></i>
                @if ($brand->status == "Active") {{__('dashboard.inactive')}} @else {{__('dashboard.active')}} @endif </a>
            <div class="dropdown-divider"></div>
            <form action="{{route('dashboard.brands.destroy', $brand->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a class="delete dropdown-item" href="#"><i class="la la-trash"></i>
                    {{__('dashboard.delete')}}</a>
            </form>
        </div>
    </div>
</div>

