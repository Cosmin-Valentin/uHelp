<div class="delete-modal-overlay">
    <div class="delete-modal">
        <div class="modal-icon">
            <div class="icon-body">
                <div class="icon-dot"></div>
            </div>
        </div>
        <div class="modal-title">Are you sure you want to continue?</div>
        <div class="modal-text">This might erase your records permanently</div>
        <div class="modal-footer">
            <div>
                <button class="delete-modal-btn cancel">Cancel</button>
            </div>
            <div>
                @if (($formType ?? null) === 'category')
                    <form method="POST" action="{{ route('uhelp.destroyCategory', '1') }}">
                @else
                    <form method="POST" action="{{ route('uhelp.destroy', $ticket->id ?? '1') }}">
                @endif
                    @csrf
                    @method('delete')
                    <button type="submit" class="delete-modal-btn confirm">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>