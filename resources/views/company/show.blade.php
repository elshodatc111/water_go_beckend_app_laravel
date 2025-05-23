@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Company Update</div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-6">
                        <img src="../{{ $Company['banner_url'] }}" class="w-50" />
                        <form action="{{ route('company_update_image') }}" method="post" class="row" enctype="multipart/form-data">
                            @csrf 
                            <input type="hidden" name="id" value="{{ $Company['id'] }}">
                            <div class="col-12 my-1 mt-2">
                                <input type="file" class="form-control" name="banner_url" required>
                            </div>
                            <div class="col-12 my-1">
                                <button type="submit" class="btn btn-primary w-100">Update Image</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('company_update_change') }}" method="post" class="row" enctype="multipart/form-data">
                            @csrf 
                            <label for="">Company Status ({{ $Company['status'] }})</label>
                            <input type="hidden" name="id" value="{{ $Company['id'] }}">
                            <div class="col-12 my-1 mt-2">
                            <select name="status" class="form-control">
                                <option value="pending" <?= $Company['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="true" <?= $Company['status'] == 'true' ? 'selected' : '' ?>>Aktiv</option>
                                <option value="delete" <?= $Company['status'] == 'delete' ? 'selected' : '' ?>>Delete</option>
                            </select>
                            </div>
                            <div class="col-12 my-1">
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Company Update Image</div>
            <div class="card-body">
                <form action="{{ route('company_update') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $Company['id'] }}">
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
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Company Location</div>
            <div class="card-body">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Latitude Min</th>
                            <th>Latitude Max</th>
                            <th>Longitude Min</th>
                            <th>Longitude Max</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($CompanyLocation as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['lat_man'] }}</td>
                                <td>{{ $item['lat_max'] }}</td>
                                <td>{{ $item['lang_man'] }}</td>
                                <td>{{ $item['lang_max'] }}</td>
                                <td>
                                    <form action="{{ route('company_location_delete') }}" method="post">
                                        @csrf 
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <button type="submit" class="btn btn-danger p-1 py-0"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('create_location') }}" method="post" class="row">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $Company['id'] }}">
                    <div class="col-6 my-1 mt-2">
                        <input type="text" class="form-control" placeholder="Latitude Min" name="lat_man" required>
                    </div>
                    <div class="col-6 my-1 mt-2">
                        <input type="text" class="form-control" placeholder="Latitude Max" name="lat_max" required>
                    </div>
                    <div class="col-6 my-1 mt-2">
                        <input type="text" class="form-control" placeholder="Longitude  Min" name="lang_man" required>
                    </div>
                    <div class="col-6 my-1 mt-2">
                        <input type="text" class="form-control" placeholder="Longitude Max" name="lang_max" required>
                    </div>
                    <div class="col-12 my-1">
                        <button type="submit" class="btn btn-primary w-100">Create Location</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            
@endsection
