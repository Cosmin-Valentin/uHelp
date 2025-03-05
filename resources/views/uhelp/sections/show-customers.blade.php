@extends('layouts.app')


@section('main')
    @include('uhelp.partials.agent-aside')

    <div class="agent-main">
        <div class="agent-main-container">
            <div class="side-app">
                <div class="app-header"></div>
                @include('uhelp.partials.agent-header', ['title' => 'Customers'])
                <div class="agent-dashboard">
                    <div class="row">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Customers List
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div>
                                            <div class="row">
                                                <div>
                                                    <table class="table-format customers-table">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th class="remove-column">
                                                                    <input type="checkbox" id="checkAll" autocomplete="off">
                                                                    <label for="checkAll"></label>
                                                                </th>
                                                                <th class="sorting">Name</th>
                                                                <th class="sorting">User Type</th>
                                                                <th>Verification</th>
                                                                <th class="sorting">Register Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($customers as $customer)
                                                                <tr>
                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                    <td class="remove-column-data">
                                                                        <input type="checkbox" autocomplete="off">
                                                                    </td>
                                                                    <td>
                                                                        <h5>{{ ucwords($customer->name) }}</h5>
                                                                        <small>{{ $customer->email }}</small>
                                                                    </td>
                                                                    <td>{{ $loop->index % 2 ? 'Agent' : 'Customer' }}</td>
                                                                    <td>
                                                                        <span class="badge badge-success-light">
                                                                            Verified
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge badge-primary-light">
                                                                            {{ $customer->created_at->format('d M, Y') }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="actions">
                                                                            <a href="{{ route('uhelp.showCustomer', $customer->id) }}" class="action-view" data-tooltip="Tickets History">
                                                                                <i class="fa fa-reply-all"></i>
                                                                            </a>
                                                                        </div>
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
