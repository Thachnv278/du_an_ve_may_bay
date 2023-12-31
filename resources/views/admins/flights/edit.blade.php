@extends('admins.layout')
@section('content')
<div class="card mb-4">
   @if ($errors->any())
<div id="error-message" style="color: red;">
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>
@endif
   <div class="card-header d-flex align-items-center justify-content-between">
     <h5 class="mb-0">Thêm Mới Chuyến Bay</h5>
 
   </div>
   <div class="card-body">
     <form action="{{route('flights.edit',$flight->id)}}" method="post">
      @csrf
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tên Máy Bay</label>
        <div class="col-sm-10">
            <select name="aircraft_id" id="" class="form-select">
                @foreach ($aircraft as $item)
                    <option value="{{ $item->id }}" {{ $flight->aircraft_id === $item->id ? 'selected' : '' }}> {{ $item->aircraft_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Chuyến bay</label>
        <div class="col-sm-10">
          <select name="route_id" id="route_id" class="form-select">
            @foreach ($route as $item)
                <option value="{{ $item->id }}" {{ $flight->route_id === $item->id ? 'selected' : '' }}>
                    {{ $item->origin }} - {{ $item->destination }}
                </option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Giá vé Phổ thông</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="price_1" value="{{ $flight->price_1 }}">
      </div>
  </div>
  <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Giá vé Thương Gia</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="price_2" value="{{ $flight->price_2 }}">
      </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Ngày Bay</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name="DepartureDate" value="{{ $flight->DepartureDate}}">
    </div>
</div>
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Thời Gian Cất Cánh</label>
         <div class="col-sm-10">
           <input type="time" class="form-control" name="DepartureTime" value="{{ $flight->DepartureTime}}">
         </div>
       </div>
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Thời Gian Hạ Cánh</label>
         <div class="col-sm-10">
           <input type="time" class="form-control" name="ArrivalTime" value="{{ $flight->ArrivalTime}}">
         </div>
       </div>
      
       <div class="row justify-content-end">
         <div class="col-sm-10">
           <button type="submit" class="btn btn-primary">Sửa</button>
           <a href="{{ route('flights.index') }}"><button type="button" class="btn btn-primary"> Danh
            Sách</button></a>
         </div>
       </div>
     </form>
   </div>
 </div>
 <script>
   document.addEventListener("DOMContentLoaded", function() {
       var errorMessage = document.getElementById("error-message");
       if (errorMessage) {
           setTimeout(function() {
               errorMessage.style.display = "none";
           }, 3000); // Hiển thị trong 3 giây, sau đó ẩn
       }
   });


   
@endsection