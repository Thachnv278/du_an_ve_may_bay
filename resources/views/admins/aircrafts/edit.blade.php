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
     
         
     
     <form action="{{route('aircrafts.edit', $aircrafts->id)}}" method="post">
      @csrf
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Tên Máy Bay</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" name="aircraft_name" value="{{$aircrafts->aircraft_name}}">
         </div>
       </div>
       <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tên loại ghế 1</label>
        <div class="col-sm-10">
            <select class="form-control" name="seat_type_1" id="seat_type_1">
                <option value="">Chọn loại ghế</option>
                <option value="">Chọn loại ghế</option>
                <option value="Phổ Thông" {{ $aircrafts->seat_type_1 === 'Phổ Thông' ? 'selected' : '' }}>Phổ thông</option>
                <option value="Thương gia"  {{ $aircrafts->seat_type_1 === 'Thương gia' ? 'selected' : '' }}>Thương gia</option>
            </select>
        </div>
    </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Số lượng loại ghế 1</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="seat_count_type_1" id="seat_count_type_1" value="{{$aircrafts->seat_count_type_1}}">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tên loại ghế 2</label>
        <div class="col-sm-10">
            <select class="form-control" name="seat_type_2" id="seat_type_2">
                <option value="">Chọn loại ghế</option>
                <option value="Phổ Thông" {{ $aircrafts->seat_type_2 === 'Phổ Thông' ? 'selected' : '' }}>Phổ thông</option>
                <option value="Thương gia"  {{ $aircrafts->seat_type_2 === 'Thương gia' ? 'selected' : '' }}>Thương gia</option>
            </select>
        </div>
    </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Số lượng loại ghế 2</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="seat_count_type_2" id="seat_count_type_2" value="{{$aircrafts->seat_count_type_2}}">
        </div>
      </div>
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Sức Chứa</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" name="seating_capacity" id="seating_capacity" readonly value="{{$aircrafts->seating_capacity}}" >
         </div>
       </div>
       
      
       <div class="row justify-content-end">
         <div class="col-sm-10">
           <button type="submit" class="btn btn-primary">Sửa</button>
           <a href="{{ route('aircrafts.index') }}"><button type="button" class="btn btn-primary"> Danh Sách</button></a>
          
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

        const seatType1Select = document.getElementById('seat_type_1');
        const seatType2Select = document.getElementById('seat_type_2');

        // Định nghĩa hàm ẩn giá trị trùng lặp trong select box
        function hideDuplicateOption(selectedValue, selectBox) {
            for (let i = 0; i < selectBox.options.length; i++) {
                if (selectBox.options[i].value === selectedValue) {
                    selectBox.options[i].style.display = 'none';
                } else {
                    selectBox.options[i].style.display = 'block';
                }
            }
        }

        // Sự kiện khi chọn lựa chọn trong select box 1
        seatType1Select.addEventListener('change', function() {
            const selectedValue = seatType1Select.value;
            hideDuplicateOption(selectedValue, seatType2Select);
        });

        // Sự kiện khi chọn lựa chọn trong select box 2
        seatType2Select.addEventListener('change', function() {
            const selectedValue = seatType2Select.value;
            hideDuplicateOption(selectedValue, seatType1Select);
        });
    });


   // tăng 
   const seatCountType1Input = document.getElementById('seat_count_type_1');
  const seatCountType2Input = document.getElementById('seat_count_type_2');
  const seatingCapacityInput = document.getElementById('seating_capacity');

  // Hàm cập nhật sức chứa dựa trên số lượng ghế loại 1 và loại 2
  function updateSeatingCapacity() {
    const seatCountType1 = parseInt(seatCountType1Input.value) || 0;
    const seatCountType2 = parseInt(seatCountType2Input.value) || 0;
    const totalSeatingCapacity = seatCountType1 + seatCountType2;
    seatingCapacityInput.value = totalSeatingCapacity;
  }

  // Gọi hàm cập nhật khi số lượng ghế loại 1 hoặc loại 2 thay đổi
  seatCountType1Input.addEventListener('input', updateSeatingCapacity);
  seatCountType2Input.addEventListener('input', updateSeatingCapacity);
   </script>


   
@endsection