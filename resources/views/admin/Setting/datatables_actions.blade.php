<div class='text-start'>
    @can('setting.edit')
    <a href="{{ route('setting.edit',$id) }}" class="btn btn-icon btn-success btn-sm mr-2"><i
            class="bi bi-pencil fs-4"></i></a>
    @endcan

    @can('setting.delete')
    <a href="{{ route('setting.delete',$id) }}" class="btn btn-icon btn-danger btn-sm"><i
            class="bi bi-trash fs-4"></i></a>
    @endcan
</div>
