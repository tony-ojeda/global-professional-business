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
                            <h1 class="fw-bolder mb-1">How to Stay Productive While Working from Home</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on December 02, 2021 by Carmen Valdivia - GPB</div>
                            <!-- Post categories-->
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Marketing</a> --}}
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Sales</a> --}}
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/productivity.png') }}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-1 mt-1 pt-1 pb-5">
                            <p class="fs-5 mb-4 text-justify">It&#39;s safe to say that 2020 is not going to go as we intended. Now that we are in the second half of the
year, we still face a lot of uncertainty. Our routines continue to change as we try to make the most of
the summer and winter. Many of us are still struggling with the effects of the economic shutdown. And
others are still working from home as we adjust to the new normal.</p>
                            <p class="fs-5 mb-4 text-justify">However, even in a telecommuting environment, we face the distractions of other family members, our
pets, our children, our partners, our roommates, and the day-to-day needs that arise in our home.
Balancing all of this with work is extremely difficult.</p>
                            <p class="fs-5 mb-4 text-justify">Read on for six ideas on the best way to stay productive while working from home and managing
everything that needs to be done.</p>

                            <ol>
                                <li><b>Have a designated workspace</b></li>
                                <p class="fs-5 mb-4 text-justify">Just like you have a desk, cubicle, or office at work, you should have a designated place at home that
you go to every day to get your work done. That should be your home base, your central location, your
0.0 on a chart. Working in the same place every day lets your brain know when it&#39;s time to work.
Working in different locations can be distracting and make it difficult for your brain to focus on the task
at hand. When you are in your designated workspace, your brain knows it&#39;s time to work and will help
you better focus on your to-do list.</p>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/tip1.png') }}" alt="..." /></figure>

                                <li><b>Keep the clutter away</b></li>
                                <p class="fs-5 mb-4 text-justify">Don&#39;t let your environment remind you of household chores and other items on your to-do list. This
goes hand in hand with having a designated workspace. Make sure that the place is clean and organized.
If you have clutter from home and other tasks you do outside of work, it only hurts your mindset. It&#39;s
important to be organized to stay focused at work. All those items cluttering up your workspace can
divert your attention. Of course, you can have things that help your work or pictures that bring back fun
memories and make you happy. That can only improve your mood and productivity levels. But avoid
overstimulation.</p>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/tip2.png') }}" alt="..." /></figure>

                                <li><b>Keep a schedule</b></li>
                                <p class="fs-5 mb-4 text-justify">Working from home is easier if you establish routines. Including your workspace and the time you spend
working. This also helps your mindset that from 9 to 5, it&#39;s time to work. Of course, you will have
distractions and time away from your desk both at home and in the office. But having a set schedule can
help you get more done during the day and disconnect at the end of the day.</p>

                                <p class="fs-5 mb-4 text-justify">I realize this can be more difficult for some, especially if you have young children in the family. You may
have to set aside some time to put the baby down for a nap or run an errand in the afternoon. But, as
much as possible, having those set hours can help make a big difference in your mental well-being while
working from home. But if you have these outside needs, that&#39;s okay! Make sure your employer is aware
of this and offers you some flexibility.</p>

                                <p class="fs-5 mb-4 text-justify">On the other hand, if you&#39;re an employer with workers who have children at home, recognize that some
flexibility may be necessary. You will get more out of your employees if you are flexible and understand
their needs.</p>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/tip3.png') }}" alt="..." /></figure>


                                <li><b>Get outside for a while</b></li>
                                <p class="fs-5 mb-4 text-justify">The advantage of being at home is a little more flexibility in your environment. The problem with most
office buildings is that there is not a lot of green space. There is no chance to get outside and enjoy the
outdoors. Many studies have shown that the benefits of going outside for a few minutes a day improve
mood and mental well-being. If you work from home, take advantage of this, and try to get outside for a
few minutes every day. Of course, this depends on your location and the time of year. But it can be
incredibly therapeutic to take a quick break in the middle of the day.</p>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/tip4.png') }}" alt="..." /></figure>

                                <li><b>Keep in touch</b></li>
                                <p class="fs-5 mb-4 text-justify">No matter how introverted you are, some human interaction is helpful during your workday. Even if
you&#39;re isolated from coworkers and teammates you used to spend the day with, keep in touch. Many
teams have created virtual moments to refresh, allowing you to socialize again as coworkers and friends.
Not everyone likes webcam meetings, but if people are comfortable, hold camera meetings! Seeing the
people, you&#39;re meeting with, rather than just hearing their voices, can do wonders for productivity.
Connect with those at home. Connect with your co-workers. Connect with your neighbors. Being
connected can improve your productivity.</p>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/tip5.png') }}" alt="..." /></figure>

                                <li><b>Disconnect at the end of the day</b></li>
                                <p class="fs-5 mb-4 text-justify">At the end of the day, log off. Don&#39;t come back later to check your email or respond to questions and
texts. It&#39;s important to set boundaries in your work environment, especially when you work from home.
Most employers don&#39;t expect you to come back to the office to get something done at 10 p.m. Just
because you can log on at that time doesn&#39;t mean you should. Set those boundaries with your family,
your employer, your co-workers, and the people you are in contact with to have the most productive
day possible, both during and outside of work hours.</p>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/tip6.png') }}" alt="..." /></figure>

                            </ol>

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
