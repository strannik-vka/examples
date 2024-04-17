@extends('layouts.app')

@section('title', 'Вы успешно отписались от рассылки')

@section('head')
<style type="text/css">
    .header,
    .footer,
    .modal {
        display: none !important;
    }

    .content {
        padding-top: unset;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
</style>
@endsection

@section('content')
<section class="section section-content section-main">
    <div class="container">
        <div class="text-1">
            Вы успешно отписались от рассылки
        </div>
    </div>
</section>
@endsection