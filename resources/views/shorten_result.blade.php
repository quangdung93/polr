@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/shorten_result.css' />
@endsection

@section('content')
<div class="logo">
    <a href="/"><img width="150" src="{{ asset('img/fpt-icon.png') }}" alt="Logo"></a>
</div>
<h3 class="page-title"><i class="feather icon-check-circle"></i> Liên kết đã rút gọn</h3>
<div class="input-group">
    <input type='text' class='result-box form-control' value='{{$short_url}}' id='short_url' />
    <div class='input-group-addon' id='clipboard-copy' data-clipboard-target='#short_url' data-toggle='tooltip' data-placement='bottom' data-title='Copied!'>
        <i class='feather icon-copy' aria-hidden='true' title='Copy to clipboard'></i>
    </div>
</div>
<a href='{{route('index')}}' class='btn btn-info bg-orange'><i class="feather icon-chevrons-left"></i> Rút gọn liên kết khác</a>
<a id="generate-qr-code" class='btn btn-primary bg-blue'><i class="feather icon-grid"></i> Tạo Mã QR</a>

<div class="qr-code-container"></div>

@endsection


@section('js')
<script src='/js/qrcode.min.js'></script>
<script src='/js/clipboard.min.js'></script>
<script src='/js/shorten_result.js'></script>
@endsection
