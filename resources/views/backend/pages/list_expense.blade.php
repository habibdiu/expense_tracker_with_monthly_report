@extends('backend.includes.backend_layout')
@section('content')
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-2">{{ $data['page_title'] }}</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th colspan="3" class="text-end fw-bold text-danger">Total Amount:</th>
                                <th class="fw-bold text-danger">{{ $data['expenses']->sum('amount') }}</th>
                            </tr>


                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data['expenses'] as $index => $expense)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $expense->category->name ?? 'N/A' }}</td>
                                    <td>{{ $expense->title }}</td>
                                    <td>{{ $expense->amount }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No expenses found</td>
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
