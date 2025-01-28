<div class="content-header-right col-md-6 col-12">
    <div class="dropdown float-md-right">
        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton" type="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
            <a class="dropdown-item" href="{{route('dashboard.categories.edit', $category->id)}}"><i class="la la-edit"></i> {{__('dashboard.edit')}}</a>
            <a class="dropdown-item" href=""><i class="la la-ban"></i> {{__('dashboard.status')}}</a>
            <div class="dropdown-divider"></div>
            <form action="{{route('dashboard.categories.destroy', $category->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a class="delete dropdown-item" href="#"><i class="la la-trash"></i>
                {{__('dashboard.delete')}}</a>
            </form>
        </div>
    </div>
</div>

