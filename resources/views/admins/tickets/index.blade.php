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
            <a href="{{ route('routes.add') }}"><button type="button" class="btn btn-primary"> Thêm Mới</button></a>
        </div>
        <h5 class="card-header">Danh Sách Vé Máy Bay</h5>
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên Máy Bay</th>
                            <th>Tên Khách Hàng</th>
                            <th>Ngày Sinh</th>
                            <th>Quốc Tịch</th>
                            <th>Điểm Khởi Hành</th>
                            <th>Điểm Đến</th>
                            <th>Thời Gian Cất Cánh</th>
                            <th>Thời Gian Hạ Cánh</th>
                            <th>Số Ghế</th>
                            <th>Giá Vé</th>
                            <th>Loại ghế</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ticket as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->id }}</strong>
                                </td>
                                <td>{{$item->flight->aircraft->aircraft_name}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->date_of_birth}}</td>
                                <td>{{$item->nationality}}</td>
                                <td>{{$item->flight->route->origin}}</td>
                                <td>{{$item->flight->route->destination}}</td>
                                <td>{{$item->flight->DepartureTime}}</td>
                                <td>{{$item->flight->ArrivalTime}}</td>
                                <td>{{$item->seat_number}}</td>
                                <td>{{$item->price}}</td>

                                



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
