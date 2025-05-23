@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Company Users</div>
            <div class="card-body text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FIO</th>
                            <th>Telefon raqam</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($CompanyUser as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['type'] }}</td>
                            <td>{{ $item['status'] }}</td>
                            <td>
                                @if($item['status']=='true')
                                <form action="{{ route('company_trash_user') }}" method="post" class="d-inline">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $item['admin_id'] }}">
                                    <button class="btn btn-danger p-0 px-1"><i class="bi bi-trash"></i></button>
                                </form>
                                <form action="{{ route('company_update_password_user') }}" method="post" class="d-inline">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $item['admin_id'] }}">
                                    <button class="btn btn-warning p-0 px-1"><i class="bi bi-lock"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan=7 class="text-center">Emploes not fount</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Company Users</div>
            <div class="card-body">
                <form action="{{ route('company_create_user') }}" method="post">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="col-12 my-1 mt-2">
                        <label for="name">FIO</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-12 my-1 mt-2">
                        <label for="phone">Telefon raqam</label>
                        <input type="text" class="form-control phone" name="phone" required>
                    </div>
                    <div class="col-12 my-1 mt-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col-12 my-1 mt-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="col-12 my-1 mt-2">
                        <label for="status">Status</label>
                        <select type="text" class="form-control" name="status" required>
                            <option value="">Tanlang</option>
                            <option value="drektor">Drektor</option>
                            <option value="currer">Currer</option>
                        </select>
                    </div>
                    <div class="col-12 my-1 mt-2">
                        <button class="btn btn-primary w-100">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            
@endsection
