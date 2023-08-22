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
     <h5 class="mb-0">Thêm Mới Hành Khách</h5>
 
   </div>
   <div class="card-body">
     
         
     
     <form action="{{route('passengers.add')}}" method="post">
      @csrf
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Tên </label>
         <div class="col-sm-10">
           <input type="text" class="form-control" name="name">
         </div>
       </div>
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Email</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" name="email">
         </div>
       </div>
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Số Điện Thoại</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" name="phone">
         </div>
       </div>
       <div class="row mb-3">
         <label class="col-sm-2 col-form-label">Ngày Sinh</label>
         <div class="col-sm-10">
           <input type="date" class="form-control" name="date_of_birth">
         </div>
       </div>
       
      
       <div class="row justify-content-end">
         <div class="col-sm-10">
           <button type="submit" class="btn btn-primary">Thêm mới</button>
           <a href="{{ route('passengers.index') }}"><button type="button" class="btn btn-primary"> Danh Sách</button></a>
          
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