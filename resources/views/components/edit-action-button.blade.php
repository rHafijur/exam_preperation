@can('edit ' . $module)
    <a href="{{ route($module . '.edit', $id) }}">
        <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
    </a>
@endcan
