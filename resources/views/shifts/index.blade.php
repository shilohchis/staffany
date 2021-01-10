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
                                        <th class="text-center tborder-right">Title</th>
                                        <th class="text-center tborder-right">Day</th>
                                        <th class="text-center tborder-right">Week Number</th>
                                        <th class="text-center tborder-right">Shift Time</th>
                                        <th class="text-center tborder-right">Published</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shifts as $s)
                                    <tr>
                                        <td class="tborder">{{ $s->title }}</td>
                                        <td class="tborder">{{ ucwords($s->day) }}</td>
                                        <td class="tborder">{{ $s->week }}</td>
                                        <td class="tborder">{{ $s->start_text }} - {{ $s->end_text }}</td>
                                        <td class="tborder">
                                            <button class="btn btn-{{ $s->is_published ? 'success' : 'secondary publish' }}" type="button" data-id="{{ $s->id }}">
                                                {{ $s->is_published ? 'Published' : 'Publish' }}
                                            </button>
                                        </td>
                                        <td class="tborder text-right">
                                            <a href="{{ route('shifts.show', $s) }}">
                                                <button class="btn btn-success" type="button">
                                                    <i class="fa fa-eye"></i> Details
                                                </button>
                                            </a>
                                            @if(!$s->is_published)
                                            <a href="{{ route('shifts.edit', $s) }}">
                                                <button class="btn btn-warning" type="button">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            </a>
                                            <button class="btn btn-danger delete" type="button" data-id="{{ $s->id }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
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
    $(document).ready(function() {
        const shiftUrl = '{{ route('shifts.index') }}';
        const ajaxObj = {
            url: '',
            method: "GET",
            contentType: "application/json",
            dataType: "json",
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: null,
            error: function(err) {
                console.log('err', err);
            }
        };
        const reload = function() {
            location.reload();
        };
        $('button.publish').click(function() {
            const id = $(this).data('id');
            $.ajax({ ...ajaxObj, url: `${shiftUrl}/${id}/publish`, method: 'put', success: reload });
        });

        $('button.delete').click(function() {
            const id = $(this).data('id');
            $.ajax({ ...ajaxObj, url: `${shiftUrl}/${id}`, method: 'delete', success: reload });
        });
    });
@endsection
