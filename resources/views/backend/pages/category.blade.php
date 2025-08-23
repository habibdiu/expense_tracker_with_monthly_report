@extends('backend.includes.backend_layout')
@section('content')
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="text-center mb-2">Category Add</h3>

                        {{-- Alerts --}}
                        @if (session('success'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong> Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Failed!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif

                        <form action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label for="name" class="form-label mt-2">Category Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="ex: Food, Transport, Shopping, Others" required>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button class="btn btn-primary" type="submit">Add</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

                {{-- Category List --}}
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-2">Category List</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Name</th>
                                    <th width="20%">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data['categories'] as $index =>$category)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No categories found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection