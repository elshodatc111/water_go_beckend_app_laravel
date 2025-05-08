@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">New Company</div>
            <div class="card-body">
                <form action="{{ route('company_cretae') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-2">
                        <label for="company_name" class="form-label">Company name</label>
                        <input type="text" class="form-control" name="company_name" required>
                    </div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                    <div class="mb-2">
                        <label for="order_price" class="form-label">Order Price</label>
                        <input type="number" class="form-control" name="order_price" required>
                    </div>
                    <div class="mb-2">
                        <label for="icon_url" class="form-label">Icon Image</label>
                        <input type="file" class="form-control" name="icon_url" required>
                    </div>
                    <div class="mb-2">
                        <label for="banner_url" class="form-label">Banner Image</label>
                        <input type="file" class="form-control" name="banner_url" required>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="lat_one" class="form-label">Latitude One</label>
                                <input type="text" required class="form-control" name="lat_one" placeholder="38.84066493">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="lang_one" class="form-label">Longitude One</label>
                                <input type="text" required class="form-control" name="lang_one" placeholder="65.82605977">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="lat_two" class="form-label">Latitude Two</label>
                                <input type="text" required class="form-control" name="lat_two" placeholder="38.84066493">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="lang_two" class="form-label">Longitude Two</label>
                                <input type="text" required class="form-control" name="lang_two" placeholder="65.82605977">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Saqlash</button>
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
                        @forelse($Company as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td style="text-align:left;"><a href="{{ $item['id'] }}">{{ $item['company_name'] }}</a></td>
                                <td>{{ $item['star'] }} ({{ $item['star_count'] }})</td>
                                <td>
                                    @if($item['status'] == 'pending')
                                        <span class="badge bg-warning text-primary">
                                            <i class="bi bi-hourglass-split me-1"></i> Kutilmoqda
                                        </span>
                                    @elseif($item['status'] == 'true')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i> Aktiv
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="bi bi-x-circle me-1"></i> Bekor qilingan
                                        </span>
                                    @endif
                                </td>
                                <td>{{ number_format($item['price'], 0, '.', ' ') }}</td>
                                <td>{{ number_format($item['balans'], 0, '.', ' ') }}</td>
                                <td>{{ number_format($item['order_price'], 0, '.', ' ') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan=7 class="text-center">Kompaniyalar topilmadi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            
@endsection
