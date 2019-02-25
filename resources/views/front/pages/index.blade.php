@extends('admin::front.layouts.one')

@php
    $title = 'Календарь';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.calendar::back.partials.breadcrumbs.index')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins calendar-package">
                    <div class="ibox-content">
                        <div class="calendar" data-events="{{ route('front.calendar.events') }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="eventTooltip" style="display: none"></div>
@endsection
