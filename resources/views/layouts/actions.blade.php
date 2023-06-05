<a href="{{ Request::url() }}/{{ $id }}" class="btn btn-primary btn-sm">
    <i class="bi bi-info-circle"></i>
</a>

<a href="{{ Request::url() }}/{{ $id }}/edit" class="btn btn-warning btn-sm">
    <i class="bi bi-pencil-square"></i>
</a>

@can('admin')
    <a href="{{ Request::url() }}/{{ $id }}" class="btn btn-danger btn-sm btn-delete">
        <i class="bi bi-trash"></i>
    </a>
@endcan
