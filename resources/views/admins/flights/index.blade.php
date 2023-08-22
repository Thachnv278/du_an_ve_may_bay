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
            <a href="{{ route('flights.add') }}"><button type="button" class="btn btn-primary"> Thêm Mới</button></a>
        </div>
        <h5 class="card-header">Danh Sách Chuyến Bay</h5>
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên Máy Bay</th>
                            <th>Điểm Khởi Hành</th>
                            <th>Điểm Đến</th>
                            <th>Thời Gian Cất Cánh</th>
                            <th>Thời Gian Hạ Cánh</th>
                            <th>Trạng Thái</th>
                            <th>Giá Phổ Thông </th>
                            <th>Giá Vé thương gia </th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flights as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->id }}</strong>
                                </td>
                                <td>{{ $item->aircraft->aircraft_name }}</td>
                                <td>{{ $item->route->origin }}</td>
                                <td>{{ $item->route->destination }}</td>
                                
                                <td><span class="badge bg-label-primary me-1">{{ $item->DepartureTime }}</span></td>
                                <td><span class="badge bg-label-warning me-1">{{ $item->ArrivalTime }}</span></td>
                                <td>{{ $item->status  }}</td>
                                <td>{{ $item->price_1 }}</td>
                                <td>{{ $item->price_2 }}</td>
                                <td class="d-flex ">
                                    <a class="dropdown-item text-success" href="{{ route('flights.edit', $item->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item text-danger" href="{{ route('flights.delete', $item->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
