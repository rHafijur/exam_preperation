@can('delete ' . $module)
    <form action="{{ route($module . '.destroy', $id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
    </form>
@endcan
