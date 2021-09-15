@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='css/index.css' />
@endsection

@section('content')
<div class="logo">
    <a href="/"><img width="150" src="{{ asset('img/fpt-icon.png') }}" alt="Logo"></a>
</div>
{{-- <h3 class='page-title color-blue'>{{env('APP_NAME')}}</h3> --}}

<form method='POST' action='/shorten' role='form'>
    <input type='text'  name='link-url' value="{{ old('link-url') }}" autocomplete='off' class='form-control long-link-input' placeholder='Nhập liên kết cần rút gọn...'/>

    <div class='row' id='options' ng-cloak>
        <p>Tùy chỉnh liên kết</p>

        @if (!env('SETTING_PSEUDORANDOM_ENDING'))
        {{-- Show secret toggle only if using counter-based ending --}}
        <div class='btn-group btn-toggle visibility-toggler' data-toggle='buttons'>
            <label class='btn btn-primary btn-sm active'>
                <input type='radio' name='options' value='p' checked /> Public
            </label>
            <label class='btn btn-sm btn-default'>
                <input type='radio' name='options' value='s' /> Secret
            </label>
        </div>
        @endif

        <div>
            <div class='custom-link-text'>
                <h2 class='site-url-field'>{{env('APP_ADDRESS')}}/</h2>
                <input type='text' name='custom-ending' autocomplete="off" class='form-control custom-url-field' placeholder="Nhập liên kết tùy chỉnh..." />
            </div>
            <div>
                <a href='#' class='btn btn-success btn-xs check-btn' id='check-link-availability'><i class="feather icon-search"></i> Kiểm tra</a>
                <div id='link-availability-status'></div>
            </div>
        </div>
    </div>
    <button type='submit' class='btn btn-info' id='shorten'><i class="feather icon-link"></i> Rút gọn</button>
    <a href='#' class='btn btn-warning' id='show-link-options'><i class="feather icon-settings"></i> Tùy chọn</a>
    <input type="hidden" name='_token' value='{{csrf_token()}}' />
</form>

<div id='tips' class='text-muted tips'>
    <i class='fa fa-spinner'></i> Loading Tips...
</div>
@endsection

@section('js')
<script src='js/index.js'></script>
@endsection
