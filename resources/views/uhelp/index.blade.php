@extends('layouts.app')

@if (!$user->isCustomer)
    @section('main')
        @include('uhelp.partials.agent-aside')
        <div class="agent-main">
            <div class="agent-main-container">
                <div class="side-app">
                    <div class="app-header">
                        <div class="bg-white w-full">
                            @include('layouts.navigation')
                        </div>
                    </div>
                    @include('uhelp.partials.agent-header')
                    @include('uhelp.partials.agent-dashboard')
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        @include('uhelp.partials.footer')
    @endsection
    
    @include('uhelp.modals.assign')
@else
    @section('header')
        @include('uhelp.partials.customer-header')
    @endsection

    @section('main')
        <main class="customer-main">
            <div class="customer-main-container">
                <div class="row">
                    @include('uhelp.partials.customer-aside')
                    <div class="page-card">
                        @include('uhelp.partials.customer-dashboard')
                    </div>
                </div>
            </div>
        </main>
    @endsection

    @section('footer')
        @include('uhelp.partials.footer')
    @endsection
@endif
@include('uhelp.modals.delete')

{{-- <x-slot name="header">
        @include('elements.back-button', [
            'header' => 'UHelp Support Ticketing System', 
            'section' =>'dashboard'
        ])
</x-slot> --}}