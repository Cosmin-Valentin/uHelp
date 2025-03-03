@extends('uhelp.app')


@section('main')
    @include('uhelp.partials.agent-aside')

    <div class="agent-main">
        <div class="agent-main-container">
            <div class="side-app">
                <div class="app-header"></div>
                @include('uhelp.partials.agent-header', ['title' => 'Previous Tickets'])
                <div class="agent-dashboard">
                    <div class="row">
                        <div class="ticket-type-container">
                            <div>
                                <div class="card">
                                    <div class="total-tickets">
                                        <div class="ticket-type-body">
                                            <div class="ticket-type-info">
                                                <span>Total Tickets</span>
                                                <h3 class="text-primary">{{ $tickets->count() }}</h3>
                                            </div>
                                            <div class="ticket-type-alt">
                                                <div class="alt-container primary-transparent">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <div class="active-tickets">
                                        <div class="ticket-type-body">
                                            <div class="ticket-type-info">
                                                <span>Active Tickets</span>
                                                <h3 class="text-success">{{ $tickets->filterByStatus('inProgress')->count() }}</h3>
                                            </div>
                                            <div class="ticket-type-alt">
                                                <div class="alt-container success-transparent">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <div class="onhold-tickets">
                                        <div class="ticket-type-body">
                                            <div class="ticket-type-info">
                                                <span>On Hold Tickets</span>
                                                <h3 class="text-secondary">{{ $tickets->filterByStatus('onHold')->count() }}</h3>
                                            </div>
                                            <div class="ticket-type-alt">
                                                <div class="alt-container warning-transparent">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <div class="closed-tickets">
                                        <div class="ticket-type-body">
                                            <div class="ticket-type-info">
                                                <span>Closed Tickets</span>
                                                <h3 class="text-secondary">{{ $tickets->filterByStatus('closed')->count() }}</h3>
                                            </div>
                                            <div class="ticket-type-alt">
                                                <div class="alt-container danger-transparent">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Previous Tickets of Customer
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div>
                                            <div class="row">
                                                <div>
                                                    <table class="table-format agent-dashboard-table">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th class="remove-column">
                                                                    <input type="checkbox" id="checkAll" autocomplete="off">
                                                                    <label for="checkAll"></label>
                                                                </th>
                                                                <th class="sorting">Ticket Details</th>
                                                                <th class="sorting">User</th>
                                                                <th class="sorting">Status</th>
                                                                <th class="sorting">Assign To</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($tickets as $ticket)
                                                                <tr>
                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                    <td class="remove-column-data">
                                                                        <input type="checkbox" autocomplete="off">
                                                                    </td>
                                                                    <td class="ticket-details" data-ticket-id="{{ $ticket->id }}">
                                                                        <div>
                                                                            <a href="{{ route('uhelp.show', $ticket->id) }}">{{ $ticket->title }}</a>
                                                                            <ul>
                                                                                <li>{{ $ticket->custom_ticket_id }}</li>
                                                                                <li>
                                                                                    <i class="fa fa-calendar"></i>
                                                                                    {{ $ticket->created_at->format('d-M-Y') }}
                                                                                </li>
                                                                                <li class="preference {{ $ticket->priority }}">{{ ucwords($ticket->priority) }}</li>
                                                                                <li>
                                                                                    <i class="fa fa-th-list"></i>
                                                                                    {{ $ticket->category ? ucwords($ticket->category->name) : 'No category available' }}
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-clock-o"></i>
                                                                                    {{ $ticket->created_at ? $ticket->created_at->diffForHumans() : 'No date available' }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $ticket->author->name }} {{ !$ticket->author->isAdmin ? '(Customer)' : '' }}</td>
                                                                    <td>
                                                                        {!! $ticket->status_html !!}
                                                                    </td>
                                                                    <td>
                                                                        @include('uhelp.elements.btn-group')
                                                                    </td>
                                                                    <td>
                                                                        @include('uhelp.elements.form-actions')
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('uhelp.partials.footer')
@endsection

@include('uhelp.modals.assign')