<div class="clear" id="comment-list">
    <div class="comments-area" id="comments">
        @if ($roomComments->isNotEmpty())
        <h4 class="comments-title">{{ $roomComments->count() }} Comments</h4>
        @endif
        <div class="p-tb30">
            @if ($roomComments->isNotEmpty())
            <!-- COMMENT LIST START -->
            <ol class="comment-list p-a30 bg-gray">
                <li class="comment">
                    @foreach($roomComments as $item)
                    <!-- COMMENT BLOCK -->
                    <div class="comment-body">
                        <div class="comment-meta">
                            <a href="javascript:void(0);">{{ $item->created_at->format('F j, Y \a\t g:i a') }}</a>
                        </div>
                        <div class="comment-author vcard">
                            <img class="avatar photo" src="{{ asset($item->image) }}" alt="">
                            <cite class="fn">{{ $item->name }}</cite>
                            <br>
                            <span>{{ $item->email }}</span>
                            <span class="says">says:</span>
                        </div>

                        <p>{!! $item->message !!}</p>

                    </div>
                    @endforeach
                </li>

            </ol>
            <!-- COMMENT LIST END -->
            @endif

            <!-- LEAVE A REPLY START -->
            <div class="comment-respond m-t30" id="respond">

                <h2 class="comment-reply-title" id="reply-title">Leave a Comments
                    <small>
                        <a style="display:none;" href="#" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a>
                    </small>
                </h2>

                <form class="comment-form" id="commentform" method="POST" action="{{ route('room.comment.store') }}">

                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <p class="comment-form-author">
                        <label for="name">Name <span class="required">*</span></label>
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name" placeholder="Name" id="name">
                    </p>

                    <p class="comment-form-email">
                        <label for="email">Email <span class="required">*</span></label>
                        <input class="form-control" type="text" value="{{ old('email') }}" name="email" placeholder="Email" id="email">
                    </p>

                    <p class="comment-form-comment">
                        <label for="message">Comment</label>
                        <textarea class="form-control" rows="8" name="message" placeholder="Comment" id="message">{{ old('message') }}</textarea>
                    </p>

                    <p class="form-submit">
                        <button class="site-button radius-no text-uppercase font-weight-600" type="submit">Submit</button>
                    </p>

                </form>

            </div>
            <!-- LEAVE A REPLY END -->
        </div>
    </div>
</div>