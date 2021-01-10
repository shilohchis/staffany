@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        {{-- <div class="chart"> --}}
            <div class="chart-col">
                <div class="chart-col-items">
                    <span>00:00</span>
                    <span>01:00</span>
                    <span>02:00</span>
                    <span>03:00</span>
                    <span>04:00</span>
                    <span>05:00</span>
                    <span>06:00</span>
                    <span>07:00</span>
                    <span>08:00</span>
                    <span>09:00</span>
                    <span>10:00</span>
                    <span>11:00</span>
                    <span>12:00</span>
                    <span>13:00</span>
                    <span>14:00</span>
                    <span>15:00</span>
                    <span>16:00</span>
                    <span>17:00</span>
                    <span>18:00</span>
                    <span>19:00</span>
                    <span>20:00</span>
                    <span>21:00</span>
                    <span>22:00</span>
                    <span>23:00</span>
                    <span>24:00</span>
                </div>
                <div class="chart-col-items">
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                    <div><hr class="line"></div>
                </div>
                <style>
                    @foreach ($shifts as $index => $s)
                        .shift-{{ $index }} {
                            grid-row: {{ $s->start_min }} / {{ $s->end_min }};
                            height: min-content;
                        }
                    @endforeach
                </style>
                <div class="chart-bars">
                    @foreach ($shifts as $index => $s)
                        <div class="cht shift-{{ $index }}">
                            <p>{{ $s->title }}</p>
                            <p>{{ $s->date_chart }}</p>
                            <p>{{ $s->time_chart }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        {{-- </div> --}}

    </div>
</section>
@endsection

@section('custom-script')
    $(document).ready(function() {

    });
@endsection
