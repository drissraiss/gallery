@extends('layouts.master')
@section('content')
    {{ $category_pictures->links() }}
    @forelse($category_pictures as $picture)
        <div class="col mb-2 ">
            <div class="card m-auto card-custom-1" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/users_pictures/' . $picture->path) }}">
                <div class="card-body">
                    <form action="{{ route('update_picture_name') }}" class="card-title" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="picture_id" value="{{ $picture->id }}">
                        <input type="hidden" name="category_id" value="{{ $category_selected_id }}">
                        <input type="text" name="new_name_picture" value="{{ $picture->name }}" readonly
                            class="input-text-custom">
                    </form>
                    <p class="card-text">{{ $picture->created_at }}</p>
                    <a href="{{ asset('storage/users_pictures/' . $picture->path) }}" target="_blanck" class="btn btn-success"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="{{ asset('storage/users_pictures/' . $picture->path) }}" download="{{ $picture->name }}"
                        class="btn btn-primary"><i class="bi bi-download"></i></a>
                    <form action="{{ route('delete_picture', [$picture->category_id, $picture->id]) }}" method="post"
                        class="d-inline form-remove-picture">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <h4 class="fst-italic mark">{{ __('category.nb') }}</h4>
    @endforelse
    {{ $category_pictures->links() }}
@endsection
