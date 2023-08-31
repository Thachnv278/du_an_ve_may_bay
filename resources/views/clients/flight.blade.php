@extends('clients.layout')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('clients/images/3.png') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">

                    <h1 class="mb-0 bread">Chuyến Bay</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section services-section">
        <div class="container content">
            <div class="container_main">
                <div class="main_item">
                    <h3 style="color: #005f6e">Chuyến Bay</h3>
                </div>
                <div class="main_item">
                    <div class="main_item_1">
                        <h3>Phổ Thông</h3>
                    </div>
                    <div class="main_item_1">
                        <h3>Thương Gia</h3>
                    </div>
                </div>
            </div>
           
            @if (count($flights) > 0)
            @foreach ($flights as $item)
            <div class="container_detail">
                <div class="main_detail">
                    <div class="detail_item">
                        <div class="detail_item_time">
                            <h3>{{ \Carbon\Carbon::parse($item->DepartureTime)->format('H:i') }}</h3>
                            
                            <p>{{$item->origin}}</p>
                        </div>
                        <div class="detail_item_time">
                            <i class="fas fa-plane"></i>
                            <p>{{ \Carbon\Carbon::parse($item->DepartureDate)->format('d-m-Y') }}</p>
                        </div>
                        <div class="detail_item_time">
                            <h3>{{ \Carbon\Carbon::parse($item->ArrivalTime)->format('H:i') }}</h3>
                            <p>{{$item->destination}}</p>
                        </div>          
                    </div>
                </div>
                <div class="main_detail_1">
                    <a href="{{ route('home.detail_1',['id'=>$item->id]) }}">

                        <div class="main_detail_right">
                            <h5>TỪ</h5>
                            <h4>{{ $item->price_1 }} <span>VND</span></h4>
                        </div>
                    </a>
                    <a href="{{ route('home.detail_2',['id'=>$item->id]) }}">

                        <div class="main_detail_right">
                            <h5>TỪ</h5>
                            <h4>{{ $item->price_2 }}<span>VND</span></h4>
                        </div>
                    </a>
                </div>
            </div>
                
            @endforeach
            @else
            <p>Không có kết quả tìm kiếm phù hợp.</p>

        @endif
           
           
           







        </div>
    </section>



    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endsection
