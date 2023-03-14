@extends('master')
@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_genre">
        Add Genre
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Is_active</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td scope="row">{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td> <a href="{{ route('admin.toggleGenre', $genre->id) }}"
                            @if ($genre->is_active) class="btn btn-success" @else class="btn btn-danger" @endif><i
                                class="bi bi-power"></i></a></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_genre{{ $genre->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{route('admin.deleteGenre',$genre->id)}}" type="button" class="btn btn-danger"> <i class="bi bi-trash3"></i></a>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="Add_genre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addGenre') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
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
    @foreach ($genres as $genre)
    <div class="modal fade" id="edit_genre{{ $genre->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.editGenre', $genre->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                value="{{ $genre->name }}">
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
@endforeach
    @endsection
