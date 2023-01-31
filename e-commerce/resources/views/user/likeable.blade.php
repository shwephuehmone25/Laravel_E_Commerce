{{ trans_choice('{0} 0 |{1} :count |[2,*] :count ', count($model->likes), ['count' => count($model->likes)]) }}

@can('like', $model)
    <form action="{{ route('like') }}" method="POST">
        @csrf
        <input type="hidden" name="likeable_type" value="{{ get_class($model) }}" />
        <input type="hidden" name="id" value="{{ $model->id }}" />
        <button class="btn btn-sm text-dark p-0">
            <i class="fa-regular fa-heart"></i>
        </button>
    </form>
@endcan

@can('unlike', $model)
    <form action="{{ route('unlike') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="likeable_type" value="{{ get_class($model) }}" />
        <input type="hidden" name="id" value="{{ $model->id }}" />
        <button class="btn btn-sm text-dark p-0">
            <i class="fas fa-heart text-primary"></i>
        </button>
    </form>
@endcan
