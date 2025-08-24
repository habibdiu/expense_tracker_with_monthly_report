@extends('backend.includes.backend_layout')

@section('content')
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @foreach($data['expenses'] as $month => $monthExpenses)
                <div class="card mb-4">
                    <div class="text-start ms-4 mt-4">
                        <h5 class="mb-0">{{ $month }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th colspan="3" class="text-end fw-bold text-danger">Total Amount:</th>
                                    <th class="fw-bold text-danger">{{ $monthExpenses->sum('amount') }}</th>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($monthExpenses as $index => $expense)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
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
            @endforeach

        </div>
    </div>
</div>
@endsection
