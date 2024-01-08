<div class='text-start'>
    @can('product.edit')
    <a href="{{ route('product.edit',$id) }}" class="btn btn-icon btn-success btn-sm mr-2"><i
            class="bi bi-pencil fs-4"></i></a>
    @endcan

    @can('product.delete')
    <a href="{{ route('product.delete',$id) }}" class="btn btn-icon btn-danger btn-sm"><i
            class="bi bi-trash fs-4"></i></a>
    @endcan
</div>