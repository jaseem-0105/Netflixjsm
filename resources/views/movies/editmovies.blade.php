@extends('master')
@section('title')
    Edit movie
@endsection
@section('content')
<div class="modal-body">
    <form method="POST" action="{{ route('admin.editMovie') }}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id"  value="{{$movie->id}}" />
        <div class="mb-3">
            <label> name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name"
                value="{{ $movie->name }}">
        </div>
        <div class="mb-3">
            <label> description</label>
            <textarea type="text" name="description" class="form-control summernote" placeholder="Enter description">{!! $movie->description !!}</textarea>
        </div>

        <div class="mb-3">
            <label>Current Image</label>
            <img src="{{ asset($movie->image) }}" alt="image" style="width: 10vh;height:10vh" />
        </div>

        <div class="mb-3">
            <label> Image</label>
            <input type="file" name="image" class="form-control" />
        </div>
        <div class="mb-3">
            <label>genre</label>
            <select name="genre_id[]" class="form-control" multiple>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @if (isset($movie) && in_array($genre->id, $genreIds)) selected
                         @endif>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
        </div>
    </form>
</div>
@endsection
