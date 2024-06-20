@extends('admin.layouts.app')
@section('main')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    
                    <div>
                        <h3>Người dùng</h3>
                        <div class="page-title-subheading">
                            Thông tin người dùng.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="{{route('users.index')}}" class="btn-shadow btn-hover-shine mr-3 btn btn-danger d-flex">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                            </svg>
                        </span>
                        Trở lại
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="row d-flex h5">
                        <div class="col-4 py-5 pl-5 d-flex justify-content-center">
                            @if ($user->avatar == null)
                                <img src="{{ asset('avatars/no_image.png') }}" alt="Avatar" class="rounded-circle" width="150" height="150">
                            @else
                                <img src="{{ asset('avatars/' . $user->avatar) }}" alt="Avatar" class="rounded-circle" width="150" height="150">
                            @endif
                        </div>
                        <div class="col-8 p-5">
                            <div class="row d-flex justify-content-between">
                                <label for="inputName"><b>Họ tên</b></label>
                                <p>{{$user->name}}</p>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <label for="inputEmail"><b>Email</b></label>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <label for="inputPhone"><b>Số điện thoại</b></label>
                                <p>{{$user->phone}}</p>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <label for="inputAddress"><b>Địa chỉ</b></label>
                                <p>{{$user->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
	
@endsection
