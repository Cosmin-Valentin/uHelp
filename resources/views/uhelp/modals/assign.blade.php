<div class="update-modal assign-overlay">
    <div class="assign-modal">
        <div class="modal-header">
            <h5 class="modal-title">Assign To Agent</h5>
            <button class="close">
                <span>×</span>
            </button>
        </div>
        <form method="post" action="{{ route('uhelp.updateTicket', $ticket->id ?? '1') }}">
            @csrf
            <div class="modal-body">
                <select name="assignee_id" required>
                    <option label="Select Agent"></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ ucwords($user->name) }}</option>
                    @endforeach   
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn-ticket" type="submit">Save</button>
            </div>
        </form> 
    </div>
</div>