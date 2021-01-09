@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="fas fa-business-time"></i>
                    </div>
                    <div class="header-title">
                        <h3>Shifts</h3>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-filled">
                    <div class="panel-body clearfix">
                        <div class="col-md-12 mt-4 mb-4">
                            {{-- <div class="col-md-12"> --}}
                                <a href="{{ route('shifts.create') }}">
                                    <button class="btn btn-success" type="button">
                                        <i class="far fa-calendar-plus"></i> Add Shift
                                    </button>
                                </a>
                            {{-- </div> --}}
                        </div>
                        </br>
                        <div class="col-md-12">
                            <table class="table table-striped table-responsive-sm table-vertical-align-middle">
                                <thead class="tborder">
                                    @php
                                        $col = request('col');
                                        $order = request('order');
                                    @endphp
                                    <tr>
                                        <th class="text-center tborder-right selection @if($col == 'title') @if($order == 'desc') arrow-down @else arrow-up @endif @endif">
                                            <a href="{{ route(Route::currentRouteName(), [
                                                'col' => 'title',
                                                'order' => $order == 'asc' ? 'desc' : 'asc'
                                                ]) }}">
                                                Title
                                            </a>
                                        </th>
                                        <th class="text-center tborder-right">Day</th>
                                        <th class="text-center tborder-right">Week Number</th>
                                        <th class="text-center tborder-right">Shift Time</th>
                                        <th class="text-center tborder-right">Published</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            {{ $shifts->links() }}
                            @if(count($shifts) == 0)
                                <strong>No data found</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-script')

@endsection
