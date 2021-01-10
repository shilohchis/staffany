@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <form action="{{ route('home') }}" method="GET" id="filter-chart">
            @csrf
            <div class="form-group">
                <div class="col-sm-2 filter">
                    <input
                        type="date"
                        value="{{ $now }}"
                        class="form-control"
                        id="date"
                        name="date"
                    >
                    <button type="button" class="btn btn-w-lg btn-success ml-3" id="submit">View</button>
                </div>
            </div>
        </form>
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
                        grid-row: {{ $s->start_min + 1 }} / {{ $s->end_min + 1}};
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
    </div>
</section>
@endsection

@section('custom-script')
    $(document).ready(function() {
        const url = $('#filter-chart').attr('action');
        $('#submit').click(function(e) {
            window.location.replace(`${url}?date=${$('#date').val()}`);
        });
    });
@endsection
