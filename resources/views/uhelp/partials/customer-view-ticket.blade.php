<div class="card customer-view-ticket">
    <div class="card-header">
        <h4 class="card-title">{{ $ticket->title }}</h4>
        <small>
            <i class="fa fa-clock-o"></i>
            Created Date
            <span>{{ $ticket->created_at ? $ticket->created_at->format('D, d M Y, h:i A') . ' (' . $ticket->created_at->diffForHumans() . ')' : 'Date not available' }}</span>
        </small>
    </div>
    <div class="card-body">
        <div>
            <p>{{ $ticket->description }}</p>
        </div>
    </div>
</div>

@if ($ticket->status !== 'closed' && $ticket->status !== 'onHold')
    <div class="card customer-reply-ticket">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title collapsed">Reply Ticket</h4>
            </div>
            <div class="panel-collapse">
                <div class="card">
                    <form method="POST" action="{{ route('uhelp.storeReply') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <textarea name="reply" id="replyComment" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-controls">
                                    <label>Status</label>
                                    <label class="custom-control">
                                        <input type="radio" name="status" value="inProgress" checked autocomplete="off">
                                        <span>New</span>
                                    </label>
                                    <label class="custom-control">
                                        <input type="radio" name="status" value="closed" autocomplete="off">
                                        <span>Solved</span>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="ticket_id" value={{$ticket->id}}>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn-ticket" id="replyTicketBtn">Reply Ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($ticket->replies->count())
    @include('uhelp.partials.ticket-reply')
@endif