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
                    @include('uhelp.partials.agent-header', ['title' => 'Ticket Information'])
                    @include('uhelp.partials.agent-view-ticket')
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        @include('uhelp.partials.footer')
    @endsection
    
    @include('uhelp.modals.delete')
    @include('uhelp.modals.priority')
    @include('uhelp.modals.category')
    @include('uhelp.modals.assign')
@else
    @section('header')
        @include('uhelp.partials.customer-header', ['title' => 'Ticket View'])
    @endsection

    @section('main')
        <main class="customer-main">
            <div class="customer-main-container">
                <div class="row">
                    @include('uhelp.partials.customer-aside-view-ticket')
                    <div class="page-card">
                        @include('uhelp.partials.customer-view-ticket')
                    </div>
                </div>
            </div>
        </main>
    @endsection

    @section('footer')
        @include('uhelp.partials.footer')
    @endsection
@endif