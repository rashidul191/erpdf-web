<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content ">
        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$room->name ?? null" :image="$room->image" />
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-tb90 ">
            <div class="container">

                <div class="room-detail-outer">
                    <div class="wt-post-media">
                        <!--Fade slider-->
                        <div class="owl-carousel owl-fade-slider-one owl-btn-vertical-center owl-dots-bottom-right m-b30">

                            <div class="item">
                                <div class="wt-thum-bx">
                                    <img src="{{ asset($room->image) }}" alt="{{ $room->name }}">
                                </div>
                            </div>

                            @foreach ( $room->gallery_image as $image )
                            <div class="item">
                                <div class="wt-thum-bx">
                                    <img src="{{ asset($image) }}" alt="{{ basename($image) }}">
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--fade slider END-->
                        <div class="room-facility">
                            <div class="room-discription">
                                <h2>{{ $room->name }}</h2>
                                <h4>Price: TK {{ number_format($room->price) }}</h4>

                                <ul class="list-unstyled text-dark d-md-flex justify-content-between align-items-center">
                                    <li><i class="fa fa-user"></i> <strong>Duration:</strong> {{ $room->time_duration }} </li>
                                    <li><i class="fa fa-expand"></i> <strong>Size:</strong> {{ $room->size }}m² </li>
                                    <li><i class="fa fa-eye"></i> <strong>View:</strong> {{ $room->view }} </li>
                                </ul>
                                <p>{!! $room->description !!}</p>
                            </div>

                            <!-- <div class="room-amenities m-b30">
                                <h3>Amenities</h3>
                                <div class="amenities-list equal-wraper clearfix">
                                    <ul>
                                        <li class="equal-col">
                                            <h5 class="m-b0"> Double bed</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Balcony</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Bathroom</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Shower</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Shampoo and soap</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Hairdryer</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Slippers</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Wardrobe</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Working table</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Mini bar</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Satellite TV</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Telephone</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Wireless connect</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">Air conditioner</h5>
                                        </li>
                                        <li class="equal-col">
                                            <h5 class="m-b0">220 AC</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="room-Rates m-b30">
                                <h3>Rates</h3>
                                <div id="no-more-tables">
                                    <table class="col-md-12 table-bordered table-striped table-condensed cf wt-responsive-table">
                                        <thead class="cf">
                                            <tr>
                                                <th>Season</th>
                                                <th>Date</th>
                                                <th class="numeric">Charges</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-title="Season">Main season 1</td>
                                                <td data-title="Date">01 April – 30 June 2024</td>
                                                <td data-title="Charges" class="numeric">$299.00/night</td>

                                            </tr>
                                            <tr>
                                                <td data-title="Season">School holidays</td>
                                                <td data-title="Date">10 Feb - 20 Mar 2024</td>
                                                <td data-title="Charges" class="numeric">$299.00/night</td>
                                            </tr>
                                            <tr>
                                                <td data-title="Season">Weekend only</td>
                                                <td data-title="Date">Thursday through Sunday</td>
                                                <td data-title="Charges" class="numeric">$399.00/night</td>
                                            </tr>
                                            <tr>
                                                <td data-title="Season">Christmas & New Year's</td>
                                                <td data-title="Date">20 Dec 2024 - 10 Jan 2020</td>
                                                <td data-title="Charges" class="numeric">$499.00/night</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div> -->

                            <div class="room-Rates m-b30">
                                <h3>Reviews</h3>
                                <div class="review-overview clearfix">
                                    <div class="review-rate-box">
                                        <span class="rating-rate-box-total">4.8</span>
                                        <span class="rating-rate-box-percent">out of 5.0</span>
                                        <div class="star-Rating-input">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="rating-bars">
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Service<strong class="rate-count">4.5</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="100" style="width: 85%;">
                                                        <span class="popOver" data-toggle="tooltips" data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Value for Money<strong class="rate-count">4.1</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md" role="progressbar" aria-valuenow="70" aria-valuemin="10" aria-valuemax="100" style="width: 70%;">
                                                        <span class="popOver" data-toggle="tooltips" data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Location<strong class="rate-count">4.8</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md" role="progressbar" aria-valuenow="90" aria-valuemin="10" aria-valuemax="100" style="width: 90%;">
                                                        <span class="popOver" data-toggle="tooltips" data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rate-bar-category">
                                            <span class="rate-bars-name">Cleanliness<strong class="rate-count">2.5</strong></span>
                                            <div class="rate-bars-line">
                                                <div class="progress wt-probar-2 radius-md m-b0">
                                                    <div class="progress-bar site-bg-primary radius-md" role="progressbar" aria-valuenow="35" aria-valuemin="10" aria-valuemax="100" style="width: 35%;">
                                                        <span class="popOver" data-toggle="tooltips" data-placement="top" title="100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clear" id="comment-list">
                    <div class="comments-area" id="comments">
                        <h2 class="comments-title">4 Comments</h2>
                        <div class="p-tb30">
                            <!-- COMMENT LIST START -->
                            <ol class="comment-list p-a30 bg-gray">
                                <li class="comment">
                                    <!-- COMMENT BLOCK -->
                                    <div class="comment-body">
                                        <div class="comment-meta">
                                            <a href="javascript:void(0);">March 6, 2024 at 7:15 am</a>
                                        </div>
                                        <div class="comment-author vcard">
                                            <img class="avatar photo" src="images/testimonials/pic1.jpg" alt="">
                                            <cite class="fn">Diego</cite>
                                            <span class="says">says:</span>
                                        </div>

                                        <p>Sit amet nibh vulputate cursus a sit amet mauris lorem ipsum dolor sit amet of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio http://themeforest.net Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat </p>
                                        <div class="reply">
                                            <a href="javscript:;" class="comment-reply-link letter-spacing-2 text-uppercase">Read More</a>
                                        </div>
                                    </div>
                                    <!-- SUB COMMENT BLOCK -->
                                    <ol class="children">
                                        <li class="comment odd parent">

                                            <div class="comment-body">
                                                <div class="comment-meta">
                                                    <a href="javascript:void(0);">March 8, 2024 at 9:15 am</a>
                                                </div>
                                                <div class="comment-author vcard">
                                                    <img class="avatar photo" src="images/testimonials/pic3.jpg" alt="">
                                                    <cite class="fn">Brayden</cite>
                                                    <span class="says">says:</span>
                                                </div>

                                                <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis</p>
                                                <div class="reply">
                                                    <a href="javscript:;" class="comment-reply-link letter-spacing-2 text-uppercase">Read More</a>
                                                </div>

                                            </div>



                                        </li>
                                    </ol>
                                </li>

                            </ol>
                            <!-- COMMENT LIST END -->

                            <!-- LEAVE A REPLY START -->
                            <div class="comment-respond m-t30" id="respond">

                                <h2 class="comment-reply-title" id="reply-title">Leave a Comments
                                    <small>
                                        <a style="display:none;" href="#" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a>
                                    </small>
                                </h2>

                                <form class="comment-form" id="commentform" method="post">

                                    <p class="comment-form-author">
                                        <label for="author">Name <span class="required">*</span></label>
                                        <input class="form-control" type="text" value="" name="user-comment" placeholder="Author" id="author">
                                    </p>

                                    <p class="comment-form-email">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input class="form-control" type="text" value="" name="email" placeholder="Email" id="email">
                                    </p>

                                    <p class="comment-form-url">
                                        <label for="url">Website</label>
                                        <input class="form-control" type="text" value="" name="url" placeholder="Website" id="url">
                                    </p>

                                    <p class="comment-form-comment">
                                        <label for="comment">Comment</label>
                                        <textarea class="form-control" rows="8" name="comment" placeholder="Comment" id="comment"></textarea>
                                    </p>

                                    <p class="form-submit">
                                        <button class="site-button radius-no text-uppercase font-weight-600" type="button">Submit</button>
                                    </p>

                                </form>

                            </div>
                            <!-- LEAVE A REPLY END -->
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

</x-guest-layout>