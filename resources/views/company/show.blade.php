@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Company Update</div>
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-2">
                        <label for="company_name" class="form-label">Company name</label>
                        <input type="text" class="form-control" name="company_name" value="{{ $Company['company_name'] }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $Company['price'] }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="order_price" class="form-label">Order Price</label>
                        <input type="number" class="form-control" name="order_price" value="{{ $Company['order_price'] }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" required>{{ $Company['description'] }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Company</div>
            <div class="card-body">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Star</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Balans</th>
                            <th>Part Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            
@endsection
