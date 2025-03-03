<div class="btn-group">
    @if ($ticket->status === 'closed' && !request()->routeIs('uhelp.index') && !request()->routeIs('uhelp.showCustomer'))
        <form id="reOpen" method="post" action="{{ route('uhelp.updateTicket', $ticket->id) }}">
            @csrf
            <input type="hidden" name="status" value="reOpened">
            <button type="submit" class="btn-ticket">
                <i class="fa fa-rotate-left"></i>
                Re-Open
            </button>
        </form> 
    @endif

    <button class="btn-small" {{ $ticket->status === 'closed' ? 'disabled' : '' }}>
        @if ($ticket->assignee_id === auth()->id())
            Admin (self)
        @elseif(isset($ticket->assignee_id))
            Agent
        @else
            Assign
        @endif
    </button>

    @if (isset($ticket->assignee_id) && $ticket->status !== 'closed')
        <form method="POST" action="{{ route('uhelp.updateTicket', $ticket->id) }}">
            @csrf
            <input type="hidden" name="unassign" value="true">
            <button type="submit" class="btn-unassign">×</button>
        </form>
    @endif

    <ul class="dropdown-menu">
        <li>
            <form method="post" action="{{ route('uhelp.updateTicket', $ticket->id) }}">
                @csrf
                <input type="hidden" name="assignee_id" value="{{ auth()->id() }}">
                <button type="submit">Self Assign</button>
            </form> 
        </li>
        <li>
            <button id="other">Other Assign</button>
        </li>
    </ul>
</div>