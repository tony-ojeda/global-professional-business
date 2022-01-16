@extends('frontend.templates.app')
@section('title', 'Blog | Global Professional Business')

@section('content')
	<div id="blog-item-banner">
		<div class="item"style="background-image:url('frontend/img/bg-banner.jpg');"></div>
	</div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Marketing Tips for your Salon</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on November 15, 2021 by Alexandra Salazar - GPB - Lima Perú</div>
                            <!-- Post categories-->
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Marketing</a> --}}
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Sales</a> --}}
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/marketing-tips.jpg') }}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-1 mt-1 pt-1 pb-5">
                            <p class="fs-5 mb-4 text-justify">According to a study conducted in Peru, in which the owners of 1,788 hairdressing salons and 1,500 esthetics salons were interviewed, 67% of
the salons and 61% of the esthetics salons indicated that they did not plan to make changes in their establishments in the short term. Only 2%
of respondents said they planned to invest in advertising.</p>
                            <p class="fs-5 mb-4 text-justify">The point is that while you are still trying to decide whether to invest in advertising, there is another salon that is already doing so and gaining
clients that could have been yours. So, what can you do?</p>

                            <ul>
                                <li>Referral Program</li>
                                <p class="fs-5 mb-4 text-justify">All salons have a percentage of clients referable to them, which is nothing more than all the satisfied clients who spread the word about
your good service. But formalizing this with a referral system or program, where you give something to the client and their referral, will
maximize the number of people who come to your salon monthly.</p>

                                <li>Loyalty program</li>
                                <p class="fs-5 mb-4 text-justify">The rate of customers who go to a store once and never come back is super high. And this is due to the lack of interest of the centers to
keep them captivated. Experts say that it costs 8 to 10 times more to attract new customers than to take care of existing ones. What can
you do?</p>
                                <p class="fs-5 mb-4 text-justify">The first thing you should do at the end of the service, offer the client an incentive for scheduling their next appointment. It can be a
percentage discount or an additional complimentary service. Another thing you can do is to make follow-up calls 3 to 7 days after the
service and use the occasion to mention the referral program if you have one.</p>

                                <li>Digital Brand</li>
                                <p class="fs-5 mb-4 text-justify">If you want to increase the recognition of your salon, just as if it were a brand, you must have a presence on social networks, as well as a
website. These platforms are very efficient when it comes to reaching a greater number of people, they allow you to have information
available about your salon 24/7 and to segment your advertisements with GPB so that they are shown in the geographic areas where you
are interested in penetrating.</p>

                                <p class="fs-5 mb-4 text-justify">Before you start, we recommend you go to a professional agency that will help you plan the contents and activate the ads in the best
way and design a website that meets all the necessary requirements for user navigation from desktop computers, Mobile and other
devices.</p>
                            </ul>
                            
                            <p class="fs-5 mb-4 text-justify">Undoubtedly, this topic is exciting and there are endless things to learn. That&#39;s why you cannot miss the talk Marketing for Salons, which will be
held very soon 2022 with Aesthetics Congress &amp; Spa in Spain, with the exclusive facilities of WRC and GPB, will be announced through this
medium, come back to watch new news of events so you do not miss and separate your space.</p>
                        </section>
                    </article>
                    <p class="text-center">Subscribe, for more information</p>
                    <p class="text-center">We promise to send only useful information for your project</p>

                    <form class="col-lg-6 offset-lg-3 form-inline mt-5 text-center mb-5">
                        <div class="row justify-content-center">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Password</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 btn-red">Register</button>
                        </div>
                    </form>

                    <!-- Comments section-->
                    {{-- <section class="mb-1"> --}}
                    {{--     <div class="card bg-light"> --}}
                    {{--         <div class="card-body"> --}}
                    {{--             <!-- Comment form--> --}}
                    {{--             <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form> --}}
                    {{--             <!-- Comment with nested comments--> --}}
                    {{--             <div class="d-flex mb-4"> --}}
                    {{--                 <!-- Parent comment--> --}}
                    {{--                 <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div> --}}
                    {{--                 <div class="ms-3"> --}}
                    {{--                     <div class="fw-bold">Commenter Name</div> --}}
                    {{--                     If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks. --}}
                    {{--                     <!-- Child comment 1--> --}}
                    {{--                     <div class="d-flex mt-4"> --}}
                    {{--                         <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div> --}}
                    {{--                         <div class="ms-3"> --}}
                    {{--                             <div class="fw-bold">Commenter Name</div> --}}
                    {{--                             And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors. --}}
                    {{--                         </div> --}}
                    {{--                     </div> --}}
                    {{--                     <!-- Child comment 2--> --}}
                    {{--                     <div class="d-flex mt-4"> --}}
                    {{--                         <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div> --}}
                    {{--                         <div class="ms-3"> --}}
                    {{--                             <div class="fw-bold">Commenter Name</div> --}}
                    {{--                             When you put money directly to a problem, it makes a good headline. --}}
                    {{--                         </div> --}}
                    {{--                     </div> --}}
                    {{--                 </div> --}}
                    {{--             </div> --}}
                    {{--             <!-- Single comment--> --}}
                    {{--             <div class="d-flex"> --}}
                    {{--                 <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div> --}}
                    {{--                 <div class="ms-3"> --}}
                    {{--                     <div class="fw-bold">Commenter Name</div> --}}
                    {{--                     When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence. --}}
                    {{--                 </div> --}}
                    {{--             </div> --}}
                    {{--         </div> --}}
                    {{--     </div> --}}
                    {{-- </section> --}}
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-red" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Marketing Design</a></li>
                                        <li><a href="#!">Business</a></li>
                                        <li><a href="#!">Sales</a></li>
                                    </ul>
                                </div>
                                {{-- <div class="col-sm-6"> --}}
                                {{--     <ul class="list-unstyled mb-0"> --}}
                                {{--         <li><a href="#!"></a></li> --}}
                                {{--         <li><a href="#!">CSS</a></li> --}}
                                {{--         <li><a href="#!">Tutorials</a></li> --}}
                                {{--     </ul> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    {{-- <div class="card mb-4"> --}}
                    {{--     <div class="card-header">Side Widget</div> --}}
                    {{--     <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        
        </div>
    </div>
@endsection
