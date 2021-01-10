@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('flash::message')
            @php
                $cur = Route::currentRouteName();
            @endphp
            <div class="row">
                <div class="col-lg-12">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe page-header-icon pe-7s-note2"></i>
                        </div>
                        <div class="header-title">
                            <h3>Form {{ $cur == 'shifts.create' ? 'Add' : 'Edit' }} Shift</h3>
                            <small>
                                Please fill all fields specially with asterisk one is required
                            </small>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-filled">
                    <div class="panel-body clearfix">
                        <form action="{{ $cur == 'shifts.create' ? route('shifts.store') : route('shifts.update', $shift) }}" method="POST">
                            @csrf
                            @if($cur == 'shifts.edit')
                                @method('PUT')
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title <span class="red">*</span></label>
                                <div class="col-sm-3">
                                    @php
                                        if($errors->any()) {
                                            $val = old('title');
                                        } else {
                                            $val = $cur == 'shifts.edit' ? $shift->title : '';
                                        }
                                    @endphp
                                    <input
                                        type="text"
                                        value="{{ $val }}"
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="title"
                                        placeholder="Title"
                                        autofocus
                                        name="title"
                                        required
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    @error('title')
                                        <span class="small red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start-date" class="col-sm-2 col-form-label">Start shift at <span class="red">*</span></label>
                                <div class="col-sm-2">
                                    @php
                                        $date = date('Y-m-d');
                                        $time = date('H:i');
                                        if($errors->any()) {
                                            $startDate = old('start_date');
                                            $startTime = old('start_time');
                                        } else {
                                            if($cur == 'shifts.edit') {
                                                $start = explode(' ', $shift->start_time);
                                                $startDate = $start[0];
                                                $startTime = $start[1];
                                            } else {
                                                $startDate = $date;
                                                $startTime = $time;
                                            }
                                        }
                                    @endphp
                                    <input
                                        type="date"
                                        value="{{ $startDate }}"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        id="start-date"
                                        name="start_date"
                                        required
                                    >
                                </div>
                                <div class="col-sm-2">
                                    <input
                                        type="time"
                                        value="{{ $startTime }}"
                                        class="form-control @error('start_time') is-invalid @enderror"
                                        id="start-time"
                                        name="start_time"
                                        required
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    @error('start_date')
                                        <span class="small red">{{ $message }}</span>
                                    @enderror
                                    @error('start_time')
                                        <span class="small red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end-date" class="col-sm-2 col-form-label">End shift at <span class="red">*</span></label>
                                <div class="col-sm-2">
                                    @php
                                        if($errors->any()) {
                                            $endDate = old('end_date');
                                            $endTime = old('end_time');
                                        } else {
                                            if($cur == 'shifts.edit') {
                                                $end = explode(' ', $shift->end_time);
                                                $endDate = $end[0];
                                                $endTime = $end[1];
                                            } else {
                                                $endDate = $date;
                                                $endTime = $time;
                                            }
                                        }
                                    @endphp
                                    <input
                                        type="date"
                                        value="{{ $endDate }}"
                                        class="form-control @error('end_time') is-invalid @enderror"
                                        id="end-date"
                                        name="end_date"
                                        required
                                    >
                                </div>
                                <div class="col-sm-2">
                                    <input
                                        type="time"
                                        value="{{ $endTime }}"
                                        class="form-control @error('end_time') is-invalid @enderror"
                                        id="end-time"
                                        name="end_time"
                                        required
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    @error('end_time')
                                        <span class="small red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex-row justify-content-center">
                                <button type="submit" class="btn btn-w-lg btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div>
    <section>
@endsection

@section('custom-script')

@endsection
