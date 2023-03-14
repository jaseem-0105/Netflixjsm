@extends('master')
@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_movie">
        Add Movie
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Is_active</th>
                <th scope="col">Image</th>
                <th scope="col">Genre</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td scope="row">{{ $movie->id }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>{!! $movie->description !!}</td>
                    <td> <a href="{{ route('admin.toggleMovie', $movie->id) }}"
                            @if ($movie->is_active) class="btn btn-success" @else class="btn btn-danger" @endif><i
                                class="bi bi-power"></i></a></td>
                    <td>
                        <img src="{{ asset($movie->image) }}" alt="movies" style="width: 10vh;height:10vh" />
                    </td>
                    <td>
                        <a href="{{route('admin.viewEditMovie',$movie->id)}}" type="button" class="btn btn-success">  <i class="bi bi-pencil-square"></i></a>

                        <a href="{{route('admin.deleteMovie',$movie->id)}}" type="button" class="btn btn-danger"> <i class="bi bi-trash3"></i></a>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="Add_movie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addMovie') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>


                        <div class="mb-3">
                            <label> description</label>
                            <textarea type="text" name="description" class="form-control summernote" placeholder="Enter description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label> Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>genre</label>
                            <select name="genre_id[]" class="form-control" multiple>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
