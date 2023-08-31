@extends('clients.layout')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('clients/images/2.png') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">

                    <h1 class="mb-0 bread">Thông tin khách hàng</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section services-section">
        <div class="container">
            <div class="form-tt">
                <form action="">
                    <div class="form-left">
                        <div class="form-top mb-5">
                            <h5>Hành khách</h5>
                            <div class="mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" placeholder="Họ và tên">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quốc tịch</label>
                                <input type="text" class="form-control" disabled value="Việt Nam">
                            </div>


                        </div>
                        <div class="form-bottom mt-5">
                            <h5>Thông tin người đặt</h5>
                            <div class="mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" placeholder="Họ và tên">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Số điện thoại ">
                            </div>
                            <input type="hidden" value="{{ now()->format('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="container__main--item">
                        <div class="container__main--item__totalMoney">
                            <div class="item__totalMoney--img">
                                <img src="https://images.unsplash.com/photo-1689080492397-820b860a8606?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fHw%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="">
                            </div>
                        </div>
                        <div class="item__totalMoney--plus">
                            <div class="item__totalMoney--plus__text">
                                <h2>Tổng Tiền</h2>
                                <h2>0 <span>VND</span></h2>
                            </div>
                            <p>Bao gồm thuế, phí và phí phụ</p>
                        </div>
                        <div class="btn_total">
                            <button type="submit" class="btn  btn-primary">Thanh toán</button>
                        </div>
                        
                    </div>









                </form>
            </div>




        </div>


    </section>



    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endsection
