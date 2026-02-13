 <div class="clear" id="comment-list">
                            <div class="comments-area" id="comments">
                                @if ($blogComments->isNotEmpty())
                                <h4 class="comments-title">{{ $blogComments->count() }} Comments</h4>
                                @endif
                                <div class="p-t30">
                                    <!-- COMMENT LIST START -->
                                    <ol class="comment-list p-a30 bg-gray">
                                        @foreach ($blogComments as $item )
                                        <li class="comment">
                                            <!-- COMMENT BLOCK -->
                                            <div class="comment-body">
                                                <div class="comment-meta">
                                                    <a href="javascript:void(0);">{{ $item->created_at->format('F j, Y \a\t g:i a') }}</a>
                                                </div>
                                                <div class="comment-author vcard">
                                                    <img class="avatar photo" src="{{ asset($item->image) }}"
                                                        alt="{{ $item->name }}">
                                                    <cite class="fn">{{ $item->name }}</cite>
                                                    <br>
                                                    <span>{{ $item->email }}</span>
                                                    <span class="says">says:</span>
                                                </div>

                                                <p>{!! $item->message !!}</p>
                                                <!-- <div class="reply">
                                                    <a href="javscript:;"
                                                        class="comment-reply-link letter-spacing-2 text-uppercase">Read
                                                        More</a>
                                                </div> -->
                                            </div>
                                        </li>
                                        @endforeach
                                    </ol>
                                    <!-- COMMENT LIST END -->

                                    <!-- LEAVE A REPLY START -->
                                    <div class="comment-respond m-t30" id="respond">
                                        <h4 class="comment-reply-title" id="reply-title">Leave a Comments
                                            <small>
                                                <a style="display:none;" href="#" id="cancel-comment-reply-link"
                                                    rel="nofollow">Cancel reply</a>
                                            </small>
                                        </h4>

                                        <form class="comment-form" action="{{ route('blog.comment.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                                            <p class="comment-form-author">
                                                <label for="author">Name <span class="required">*</span></label>
                                                <input class="form-control" type="text" value="{{ old('name') }}" name="name"
                                                    placeholder="Name" id="author">
                                            </p>

                                            <p class="comment-form-email">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input class="form-control" type="text" value="{{ old('email') }}" name="email"
                                                    placeholder="Email" id="email">
                                            </p>

                                            <p class="comment-form-comment">
                                                <label for="message">Comment</label>
                                                <textarea class="form-control" rows="8" name="message"
                                                    placeholder="Comment" id="message"></textarea>
                                            </p>

                                            <p class="form-submit">
                                                <button class="site-button radius-no text-uppercase font-weight-600"
                                                    type="submit">Submit</button>
                                            </p>

                                        </form>

                                    </div>
                                    <!-- LEAVE A REPLY END -->
                                </div>
                            </div>
                        </div>