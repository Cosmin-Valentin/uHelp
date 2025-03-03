<div class="page-header">
    <div>
        <h4 class="page-title">
            <span>{{ $title ?? 'Dashboard' }}</span>
        </h4>
    </div>
    <div>
        @if (request()->routeIs('uhelp.index'))
            <div class="header-info">
                <div class="header-date">
                    <div>
                        <i class="fa fa-calendar"></i>
                    </div>
                    <span>{{ date('j F Y') }}</span>
                </div>
                <div class="header-time">
                    <div>
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <span></span>
                </div>
            </div>
        @elseif (request()->routeIs('uhelp.show'))
            <div class="btn-list">
                <button class="btn-light">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
                <div class="dropdown">
                    <span class="quick-delete-ticket">
                        <i class="fa fa-trash"></i>
                        Delete Ticket
                    </span>
                    @if ($ticket->status !== 'closed')
                        <form id="close" method="post" action="{{ route('uhelp.updateTicket', $ticket->id) }}">
                            @csrf
                            <input type="hidden" name="status" value="closed">
                            <button type="submit">
                                <i class="fa fa-times-circle"></i>
                                Force Close
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>