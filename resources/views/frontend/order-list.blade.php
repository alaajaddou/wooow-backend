@extends('frontend.layout')

@section('css')
    <style>


        .card {
            margin: auto;
            padding: 4vh 0;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-top: 3px solid #C59209;
            border-bottom: 3px solid #C59209;
            border-left: none;
            border-right: none
        }

        .title {
            color: #C59209;
            font-weight: 600;
            margin-bottom: 2vh;
            padding: 0 8%;
            font-size: initial
        }

        #details {
            font-weight: 400
        }

        .info {
            padding: 5% 8%
        }

        #heading {
            color: grey;
            line-height: 6vh
        }

        .pricing {
            background-color: #C59209;
            padding: 2vh 8%;
            font-weight: 400;
            line-height: 2.5
        }

        .total {
            padding: 2vh 8%;
            color: #C59209;
            font-weight: bold
        }

        .footer {
            padding: 0 8%;
            font-size: x-small;
            color: black
        }

        .footer img {
            height: 5vh;
            opacity: 0.2
        }

        .footer a {
            color: #C59209
        }

        .footer .col-10,
        .col-2 {
            display: flex;
            padding: 3vh 0 0;
            align-items: center
        }

        .footer .row {
            margin: 0
        }

        #progressbar {
            overflow: hidden;
            color: rgb(252, 103, 49);
            padding-left: 0px;
        }

        #progressbar li {
            list-style-type: none;
            font-size: x-small;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
            color: rgb(160, 159, 159)
        }

        #progressbar .step0:nth-child(1):before {
            content: "";
            color: rgb(252, 103, 49);
            width: 5px;
            height: 5px;
            margin-left: 0px !important
        }

        #progressbar .step0:nth-child(2):before {
            content: "";
            color: #FFF;
            width: 5px;
            height: 5px;
            margin-left: 20%
        }

        #progressbar .step0:nth-child(3):before {
            content: "";
            color: #FFF;
            width: 5px;
            height: 5px;
            margin-right: 20%
        }

        #progressbar .step0:nth-child(4):before {
            content: "";
            color: #FFF;
            width: 5px;
            height: 5px;
            margin-right: 0px !important
        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #DDD;
            border-radius: 50%;
            margin: auto;
            z-index: -1;
            margin-bottom: 1vh
        }

        #progressbar li:after {
            content: '';
            height: 2px;
            background: #DDD;
            position: absolute;
            left: 0%;
            right: 0%;
            margin-bottom: 2vh;
            top: 1px;
            z-index: 1
        }

        .progress-track {
            padding: 0 8%
        }

        #progressbar li:nth-child(2):after {
            margin-right: auto
        }

        #progressbar li:nth-child(1):after {
            margin: auto
        }

        #progressbar li:nth-child(3):after {
            float: left;
            width: 68%
        }

        #progressbar li:nth-child(4):after {
            margin-left: auto;
            width: 132%
        }

        #progressbar li.active {
            color: black
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #C59209;
        }
    </style>
@endsection

@section('content')
    @if(count($orders) > 0)
        <div class="card h-100 py-1 border-0">
            <div class="card-body p-1">
                @foreach($orders as $order)
                    @include('frontend.partials.order', ['order'=>$order, 'statuses'=>$statuses])
                @endforeach
            </div>
            <div class="text-muted text-center text-small card-footer bg-transparent border-0">
                <a class="btn btn-secondary btn-block" href="{{ route('home') }}">{{ __('labels.shop_now') }}
                    <i class="fas fa-paper-plane"></i>
                </a>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row h-100">
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="icon text-center" style="color: #cecece;">
                        <i class="fas fa-file-invoice fa-3x mb-3"></i>
                        <h4 class="text">{{ __('labels.no_orders') }}</h4>
                        <a class="btn btn-secondary" href="{{ route('home') }}">{{ __('labels.shop_now') }}
                            <i class="fas fa-paper-plane"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
