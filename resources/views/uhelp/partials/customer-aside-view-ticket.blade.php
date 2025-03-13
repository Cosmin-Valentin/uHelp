<div class="customer-card">
    <div class="card">
        <div class="card-body">
            <div class="profile">
                <div class="profile-img">
                    <img src="{{ asset($user->id . '.jpg') }}" alt="user avatar">
                </div>
                <h5 class="profile-name">{{ ucwords($user->name) }}</h5>
                <small class="profile-email">{{ $user->email }}</small>
            </div>
        </div>
    </div>
    
    @if($ticket->assignee_id && $ticket->assigner_id)
        @include('uhelp.elements.assign-activity')
    @endif

    <div class="card ticket-information">
        <div class="card-header">
            <div class="card-title">Ticket Information</div>
        </div>
        <div class="card-body">
            <div class="agent-side-table">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <span>Ticked ID</span>
                            </td>
                            <td>:</td>
                            <td>
                                <span>{{ $ticket->custom_ticket_id }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Category</span>
                            </td>
                            <td>:</td>
                            <td>
                                <span>{{ ucwords($ticket->category->name) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Priority</span>
                            </td>
                            <td>:</td>
                            <td>
                                {!! $ticket->priority_html !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Open Date</span>
                            </td>
                            <td>:</td>
                            <td>
                                <span>{{ $ticket->created_at->format('d-M-Y') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Status</span>
                            </td>
                            <td>:</td>
                            <td>
                                {!! $ticket->status_html !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>