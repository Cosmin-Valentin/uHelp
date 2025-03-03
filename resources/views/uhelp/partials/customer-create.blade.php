<div class="card">
    <div class="card-header">
        <h4 class="card-title">New Ticket</h4>
    </div>
    <form id="user_form" method="POST" action="{{ route('uhelp.create') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div>
                        <label>Subject</label>
                    </div>
                    <div>
                        <input type="text" name="title" class="ticket-form-control"  id="subject" placeholder="Subject" autocomplete="off" required>
                        <small>
                            Maximum <b>10</b> Characters
                        </small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div>
                        <label>Category</label>
                    </div>
                    <div>
                        <select name="category_id" class="ticket-form-control" id="category" required>
                            <option label="Select Category"></option>
                            @foreach ($categories as $category)
                                @if ($category->status)
                                    <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>                                   
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div>
                        <label>Description</label>
                    </div>
                    <div>
                        <textarea name="description" id="message" autocomplete="off" required></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="ticket-form-checkbox">
                    <input type="checkbox" value="agreed" autocomplete="off" required>
                    <span>I agree with Terms and Services</span>
                </label>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn-ticket" id="createTicketBtn">Create Ticket</button>
        </div>
    </form>
</div>