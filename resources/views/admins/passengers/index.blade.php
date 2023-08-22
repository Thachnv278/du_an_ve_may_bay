@extends('admins.layout')
@section('content')
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    <div id="success-message" class="alert alert-success" style="display: none; ">
        <i class="fas fa-check-circle"></i> Thêm thành công.
    </div>

    <div class="card">

        <div class="card-header">
            <a href="{{ route('passengers.add') }}"><button type="button" class="btn btn-primary"> Thêm Mới</button></a>
        </div>
        <h5 class="card-header">Danh Sách Khách Hàng</h5>
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Ngày Sinh</th>

                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($passengers as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->id }}</strong>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->date_of_birth }}</td>

                                <td class="d-flex ">
                                    <a class="dropdown-item text-success" href="{{ route('passengers.edit', $item->id)}}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item text-danger" href="{{ route('passengers.delete', $item->id)}}"><i
                                            class="bx bx-trash me-1"></i> Delete</a>
                                </td>



                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successMessage = document.getElementById("success-message");
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 3000); // Hiển thị trong 3 giây, sau đó ẩn
            }
        });
    </script>
@endsection
