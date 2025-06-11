@extends('admin.layouts.master');
@section('content')
     <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Dispatch Manager</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Dispatch Manager</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Dispatch Manager</div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('dispatch.post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Full Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Name" />
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email" />
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Phone</label>
                                            <input type="number" class="form-control" name="mobile"
                                                placeholder="Enter Mobile" />
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Role</label>
                                            <select class="form-control" name="role">
                                                <option value="Admin">Admin</option>
                                                <option value="Product Manager">Product Manager</option>
                                                <option value="Machine Operator">Machine Operator</option>
                                                <option value="Dispatch">Dispatch</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Enter Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Confirm password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Enter Confirm Password" />
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-success">Add</button>
                                        <button class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection