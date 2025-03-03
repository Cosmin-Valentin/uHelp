<div class="update-modal priority-overlay">
    <div class="priority-modal">
        <div class="modal-header">
            <h5 class="modal-title">Priority</h5>
            <button class="close">
                <span>×</span>
            </button>
        </div>
        <form method="post" action="{{ route('uhelp.updateTicket' , $ticket->id) }}">
            @csrf
            <div class="modal-body">
                <select name="priority" required>
                    <option label="Select Priority"></option>
                    <option value="low">Low</option>    
                    <option value="medium">Medium</option>    
                    <option value="high">High</option>    
                    <option value="critical">Critical</option>    
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn-ticket" type="submit">Save</button>
            </div>
        </form> 
    </div>
</div>