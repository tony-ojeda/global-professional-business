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
                            <h1 class="fw-bolder mb-1">Small Business Marketing</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on January 1, 2021 by Alexandra Salazar - GPB - Lima Perú</div>
                            <!-- Post categories-->
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Marketing</a> --}}
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Sales</a> --}}
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/marketing1.png') }}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-1 mt-1 pt-1 pb-5">
                            <p class="fs-5 mb-4 text-justify">For starters, you don&#39;t need a lot of money and you don&#39;t need marketing consultants to deal with this aspect of your business. There are many
tools and resources that you can access with little money, for example, you can research marketing collaborations, thus dividing time, money, and
resources to achieve your ideals. Finding a business that you like or crave the most, what makes it advantageous for your business is working hard with a lot
of effort. One of the most important parts of small business marketing is attracting new customers, but it can also be one of the hardest for start-
ups.</p>
                            <p class="fs-5 mb-4 text-justify">An example of successful marketing collaboration is to work together with another company like GPB to create your publication of your product, so
that they launch it to the public is complementary that they recommend each other, therefore, you have a goal of your products, with possibilities
of obtaining many more. With this type of marketing for small businesses, it is recommended to promote them. The advantage is that your small
business will reach a new market, a new audience and you will go further. Any company with a common budget that allows businesses to expand
without exhausting their accounts and reach insolvency before the results begin to show.</p>

                            <p>Here are some ideas to help you with small business marketing, whether collaborative or not:</p>

                            <ul>
                                <li>Strategy</li>
                                <p class="fs-5 mb-4 text-justify">All salons have a percentage of clients referable to them, which is nothing more than all the satisfied clients who spread the word about
your good service. But formalizing this with a referral system or program, where you give something to the client and their referral, will
maximize the number of people who come to your salon monthly.</p>

                                <li>Know your customer:</li>
                                <p class="fs-5 mb-4 text-justify">If you own a small business, then you are directly with your customers, or at least very close. You are not the real
seller, but you must still maintain the relationship with your customers. Set up a quiz on your website or place a suggestion box in the store.
Ask your customers how they feel about services, what they would like to improve or change, etc. This will give you valuable feedback and
show you which direction to take. In case of collaboration, find out which other brands your customers are taking; this will give you an idea
of what other brands they could associate yours with.</p>

                                <li>Keep your identity:</li>
                                <p class="fs-5 mb-4 text-justify">Even if you collaborate or not, maintaining your identity is essential to keeping your customers earned so long. If you
suddenly have the funds and opportunity to invest in your marketing strategies, make sure you don&#39;t distance yourself from what made you
a success in the first place. You can try to offer something new, create some prize contests for your customers, invest in advertising and
image, if you started with the image of a family – owned business, or a family- oriented business, do not lose that identity; you can add it,
but never lose sight of what made it popular in the first place, otherwise your customers will look for something else.</p>

                            </ul>
                            
                            <p class="fs-5 mb-4 text-justify">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p>
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
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection
