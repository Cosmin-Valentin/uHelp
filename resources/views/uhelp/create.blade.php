@extends('uhelp.app')

@if ($user->isAdmin)
    @section('main')
        @include('uhelp.partials.agent-aside')
        <div class="agent-main">
            <div class="agent-main-container">
                <div class="side-app">
                    <div class="app-header"></div>
                    @include('uhelp.partials.agent-header', ['title' => 'Create Ticket'])
                    @include('uhelp.partials.agent-create')
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        @include('uhelp.partials.footer')
    @endsection
@else
    @section('header')
        @include('uhelp.partials.customer-header', ['title' => 'Create Ticket'])
    @endsection

    @section('main')
        <main class="customer-main">
            <div class="customer-main-container">
                <div class="row">
                    @include('uhelp.partials.customer-aside')
                    <div class="page-card">
                        @include('uhelp.partials.customer-create')
                    </div>
                </div>
            </div>
        </main>
    @endsection

    @section('footer')
        @include('uhelp.partials.footer')
    @endsection
@endif