<div class="card assign-activity">
    <div class="card-header">
        <h3 class="card-title">Assign Activity</h3>
    </div>
    <div class="card-body">
        <ul class="ticket-activity">
            <li>
                <div>
                    <div class="activity-img">
                        <span>
                            <img src="{{ asset($ticket->author->id . '.jpg') }}" alt="user avatar">
                        </span>
                    </div>
                    <div class="activity-user-info">
                        <p class="activity-created">Created By</p>
                        <p class="activity-user-name">
                            {{ ucwords($ticket->author->name) }}
                            <span>(Customer)</span>
                        </p>
                    </div>
                    <div class="activity-date">
                        <div>{{ $ticket->created_at->format('d M, Y') }}</div>
                        <div>{{ $ticket->created_at->format('h.i A') }}</div>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <div class="activity-img">
                        <span>
                            <img src="{{ asset($ticket->assigner->id . '.jpg') }}" alt="user avatar">
                        </span>
                    </div>
                    <div class="activity-user-info">
                        <p class="activity-user-name">
                            {{ ucwords($ticket->assigner->name) }}
                            <span>(Admin)</span>
                        </p>
                        <p class="text-success">
                            @if ($ticket->assignee_id !== $ticket->assigner_id)
                                Assigner
                            @else
                                Self Assigned
                            @endif
                        </p>
                    </div>
                </div>
            </li>
            @if ($ticket->assignee_id !== $ticket->assigner_id)
                <li>
                    <div>
                        <div class="activity-img">
                            <span>
                                <img src="{{ asset($ticket->assignee->id . '.jpg') }}" alt="user avatar">
                            </span>
                        </div>
                        <div class="activity-user-info">
                            <p class="activity-user-name">
                                {{ ucwords($ticket->assignee->name) }}
                                <span>(Agent)</span>
                            </p>
                            <p>Assignee</p>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>