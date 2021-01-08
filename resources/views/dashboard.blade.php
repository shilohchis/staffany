@extends('layouts.master')

@section('content')
    @empty($balance)
    <div class="modal fade" id="modalChooseYear" tabindex="-1" role="dialog" aria-modal="true" style="display: none;">
        <div class="modal-dialog">
            <form action="{{ route('setting.year') }}" method="POST">
                @csrf

                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">{{ __('Choose year')}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Choose the year you want to work on') }}</label>
                                    <select class="form-control @error('year') is-invalid @enderror" name="year">
                                        @foreach($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('year')
                                        <span class="form-text small invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-accent">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endempty
@endsection

@section('custom-script')
    $(document).ready(function() {
        @if(Route::currentRouteName('home'))
            @if(!$balance || $errors)
                //modal form for set year
                $('#modalChooseYear').modal({backdrop: 'static', keyboard: false});
            @endif
        @endif
    });
@endsection
