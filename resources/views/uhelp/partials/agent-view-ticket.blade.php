<div class="row">
    <div class="agent-ticket-info">
        <div>
            <div class="card">
                <div class="card-header">
                    <div>
                        <h4 class="card-title ticket-title">{{ $ticket->title }}</h4>
                        <small>
                            <i class="fa fa-clock-o"></i>
                            Created At 
                            <span>{{ $ticket->created_at ? $ticket->created_at->format('D, d M Y, h:i A') . ' (' . $ticket->created_at->diffForHumans() . ')' : 'Date not available' }}</span>
                        </small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="read">
                        <span>{{ $ticket->description }}</span>
                    </div>
                </div>
            </div>

            @if ($ticket->status !== 'closed')
                <div class="card agent-reply-ticket">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title {{ $ticket->replies->count() > 0 ? '' : 'collapsed' }}">Reply Ticket</h4>
                        </div>
                        <div class="panel-collapse {{ $ticket->replies->count() > 0 ? '' : 'show' }}">

                            <div class="card">
                                <form method="POST" action="{{ route('uhelp.storeReply') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea name="reply" id="comment" autocomplete="off" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-controls">
                                                <label>Status</label>
                                                <label class="custom-control">
                                                    <input type="radio" name="status" value="inProgress" checked autocomplete="off">
                                                    <span>In-Progress</span>
                                                </label>
                                                <label class="custom-control">
                                                    <input type="radio" name="status" value="closed" autocomplete="off">
                                                    <span>Solved</span>
                                                </label>
                                                <label class="custom-control">
                                                    <input type="radio" name="status" value="onHold" autocomplete="off">
                                                    <span>On-Hold</span>
                                                </label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
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
        </div>
        <div>
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
                                    <td id="category">
                                        <span>{{ ucwords($ticket->category->name) }}</span>
                                        <button data-tooltip="Change Category">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Priority</span>
                                    </td>
                                    <td>:</td>
                                    <td id="priority">
                                        {!! $ticket->priority_html !!}
                                        <button data-tooltip="Change Priority">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Open Date</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span>{{ $ticket->created_at->format('d M, Y') }}</span>
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
                <div class="card-footer">
                    @include('uhelp.elements.btn-group')
                </div>
            </div>

           @if($ticket->assignee_id && $ticket->assigner_id)
                @include('uhelp.elements.assign-activity')
           @endif

            <div class="card customer-details">
                <div class="card-header">
                    <div class="card-title">Customer Details</div>
                </div>
                <div class="card-body">
                    <div class="profile-pic">
                        <div class="profile-pic-img">
                            <img src="{{ asset($ticket->author->id . '.jpg') }}" alt="user avatar">
                        </div>
                        <div>
                            <h5>{{ $ticket->author->name }}</h5>
                            <h6>{{ $ticket->author->name }}</h6>
                            <small>{{ $ticket->author->email }}</small>
                        </div>
                    </div>
                    <div class="profile-table">
                        <table>
                            <tr>
                                <td>
                                    <span>IP</span>
                                </td>
                                <td>:</td>
                                <td>
                                    <span>188.27.61.119</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Mobile Number</span>
                                </td>
                                <td>:</td>
                                <td>
                                    <span>+1 (616) 586-2604</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Country</span>
                                </td>
                                <td>:</td>
                                <td>
                                    <span>Romania</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Timezone</span>
                                </td>
                                <td>:</td>
                                <td>
                                    <span>Europe/Bucharest</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>