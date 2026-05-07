<div class="reputation-section-two style-two">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Form Column -->
            <div class="form-column col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="form-boxed">
                        <h5>free consulation</h5>

                        <div class="consult-form">
                            <form method="post" action="{{ route('contact-form-message.store') }}">

                                @csrf
                                <!--Form Group-->
                                <div class="form-group">
                                    <label>full name</label>
                                    <input type="text" name="name" required value="{{ old('name') }}" placeholder="Enter your full name" required>
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" required value="{{ old('email') }}" placeholder="Enter your email address" required>
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Enter subject" required>
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <label>message</label>
                                    <textarea name="message" placeholder="Write your message here"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">send your messenger</span></button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <div class="title">{!! business_setting('faq_sub_title') !!}</div>
                        <h2><span>{!! business_setting('faq_title') !!} </span></h2>
                    </div>
                    <div class="blocks-outer">
                        @foreach ($faqs as $item)
                        <!-- Reputation Block -->
                        <div class="reputation-block">
                            <div class="inner-box">
                                <h5>{!! $item->question !!}</h5>
                                <div class="text">{!! $item->answer !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>