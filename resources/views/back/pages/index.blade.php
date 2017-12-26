@extends('admin::back.layouts.app')

@php
    $title = 'Календарь';
@endphp

@section('title', $title)

@pushonce('pre_styles:fullcalendar')
    <!-- FULLCALENDAR -->
    <link href="{!! asset('admin/css/plugins/fullcalendar/fullcalendar.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/css/plugins/fullcalendar/fullcalendar.print.min.css') !!}" rel="stylesheet" media="print">
@endpushonce

@pushonce('styles:tippy')
    <!-- TIPPY -->
    <link href="{!! asset('admin/css/plugins/tippy/tippy.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/css/plugins/tippy/themes.css') !!}" rel="stylesheet">
@endpushonce

@section('content')

    @push('breadcrumbs')
        @include('admin.module.calendar::back.partials.breadcrumbs')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="row">

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                    </div>
                    <div class="ibox-content">
                        <div class="fullcalendar" data-events="{{ route('back.calendar.events') }}" data-change="{{ route('back.calendar.change') }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="eventTooltip" style="display: none"></div>
@endsection

@pushonce('scripts:moment')
    <!-- MOMENT -->
    <script src="{!! asset('admin/js/plugins/moment/moment-with-locales.min.js') !!}"></script>
@endpushonce

@pushonce('scripts:fullcalendar')
    <!-- FULLCALENDAR -->
    <script src="{!! asset('admin/js/plugins/fullcalendar/fullcalendar.min.js') !!}"></script>
    <script src="{!! asset('admin/js/plugins/fullcalendar/locale/ru.js') !!}"></script>
@endpushonce

@pushonce('scripts:tippy')
    <!-- TIPPY -->
    <script src="{!! asset('admin/js/plugins/tippy/tippy.all.min.js') !!}"></script>
@endpushonce
