<div class="update-modal edit-category-overlay">
    <div class="edit-category-modal">
        <div class="modal-header">
            <h5 class="modal-title">Edit Category</h5>
            <button class="close">
                <span>×</span>
            </button>
        </div>
        <form method="post" action="{{ route('uhelp.updateCategory', '1') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div>
                            <label for="name">Name:</label>
                        </div>
                        <div>
                            <input type="text" name="name" id="name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div>
                            <label for="status">Status:</label>
                        </div>
                        <div>
                            <input type="checkbox" name="status" id="status">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-ticket" type="submit">Save</button>
            </div>
        </form> 
    </div>
</div>