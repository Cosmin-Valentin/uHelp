<div class="actions">
    @if ($user->isAdmin || in_array($ticket->status, ['closed', 'onHold']))
        <a href="{{ route('uhelp.show', $ticket->id) }}" class="action-view" data-tooltip="View Ticket">
            <i class="fa fa-eye"></i>
        </a>
    @else
        <a href="{{ route('uhelp.show', $ticket->id) }}" class="action-view" data-tooltip="Edit Ticket">
            <i class="fa fa-edit"></i>
        </a>
    @endif
    <button class="action-delete" data-tooltip="Delete Ticket">
        <i class="fa fa-trash-o"></i>
    </button>
</div>