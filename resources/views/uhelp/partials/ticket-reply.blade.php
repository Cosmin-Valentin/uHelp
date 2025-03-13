<div class="card customer-conversation">
    <div class="card-header">
        <h4 class="card-title">Conversations</h4>
    </div>
    <div>
        @foreach ($replies as $reply)
            <div class="card-body">
                <div>
                    <img src="{{ asset($reply->author->id . '.jpg') }}" alt="user avatar">
                    <div>
                        <div class="media-body">
                            <h5>{{ $reply->author->name }}</h5>
                            <small>
                                <i class="fa fa-clock-o"></i>
                                {{ $reply->created_at->diffForHumans() }}
                            </small>
                            <div>
                                <p>{{ $reply->reply }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>