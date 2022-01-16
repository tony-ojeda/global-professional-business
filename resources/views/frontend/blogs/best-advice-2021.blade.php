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
                            <h1 class="fw-bolder mb-1">THE BEST ADVICE WE HAVE HEARD IN 2021</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on December 20, 2021 by Luchy Velez - GPB</div>
                            <!-- Post categories-->
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Marketing</a> --}}
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Sales</a> --}}
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/best-advice.png') }}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-1 mt-1 pt-1 pb-5">
                            <p class="fs-5 mb-4 text-justify">It is hard to believe that another challenging, yet promising calendar year has passed for small
businesses. A vast majority of businesses that have temporarily closed have reopened, while
consumer interest in indoor and outdoor activities-from entertainment to fitness is on the rise
(GPB economy average).</p>
                            <p class="fs-5 mb-4 text-justify">To celebrate or share in that small business resilience over the past year and beyond, we
compiled the top seven Tips from businesses and industry experts in 2021.</p>

                            <ol>
                                <li><b>Alex Coffee House - Lima - Peru</b></li>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/advice1.png') }}" alt="..." /></figure>
                                <p class="fs-5 mb-4 text-justify">Have a designated workspace</p>
                                <p><i>Just like you have a desk, cubicle, or office at work, you should have a designated place at home that
you go to every day to get your work done. That should be your home base, your central location, your
0.0 on a chart. Working in the same place every day lets your brain know when it&#39;s time to work.
Working in different locations can be distracting and make it difficult for your brain to focus on the task
at hand. When you are in your designated workspace, your brain knows it&#39;s time to work and will help
you better focus on your to-do list.</i></p>
                                <p><b>Becoming a leader</b></p>
                                <p><i>&quot;Working on myself has been possibly the most powerful thing since I left my last company.
Understanding that I must work on developing myself and growing for the rest of my life. I can&#39;t
expect the employees in my business to self-develop if I don&#39;t lead by example.&quot;</i></p>

                                <li><b>Xavier Rupay - Lake Forest, CA Javi&#39;s Events</b></li>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/advice2.png') }}" alt="..." /></figure>
                                <p class="fs-5 mb-4 text-justify">Behind the review. Great customer service starts at the top and extends across all businesses.</p>
                                <p><i>&quot;Taking responsibility for everything doesn&#39;t mean doing everything. You have to create a
whole system that allows you to control everything without doing everything.&quot;</i></p>

                                <li><b>Veronica Valdivia, &quot;Vero Beauty Salon&quot; - Lima</b></li>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/advice3.png') }}" alt="..." /></figure>
                                <p class="fs-5 mb-4 text-justify">What I wish I knew when I started my beauty business</p>
                                <p class="fs-5 mb-4 text-justify">Master your operations</p>
                                <p><i>&quot;Always be advertising, always planning, always promoting...everything they want to insert in
there. You must be inserting things on the net&quot;.</i></p>

                                <li><b>Lourdes Jimenes, Vera Cruz México &quot;Ulises Tacos &amp; BBQ&quot;.</b></li>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/advice4.png') }}" alt="..." /></figure>
                                <p class="fs-5 mb-4 text-justify">Behind the comments is the most dynamic combination of hospitality with digital marketing.</p>
                                <p><i>&quot;Regardless of what your objective is, you have to execute operations well. You must
understand the numbers and fundamentally manage everything well. Without that, nothing
matters about the quality of the food, the concept, or what people talk about you. If you can&#39;t
sustain this business operation successfully every month, every year, chances are you&#39;re not
going to make it.&quot;</i></p>

                                <li><b>Doraliza Córdova _ Lima - &quot;Frayke Peruvian Restaurant&quot;.</b></li>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/advice5.png') }}" alt="..." /></figure>
                                <p class="fs-5 mb-4 text-justify">How a Peruvian twist on staple foods in Peru and America is bringing cultures closer together.</p>
                                <p><i>&quot;Each social media platform is like one of the different rooms in your restaurant, where
different types of customers sit. But they all come to the same house, that house is their
identity with the brand.&quot;</i></p>

                                <li><b>Cristina Pérez - Colombia - &quot;Cristi Clothing&quot;.</b></li>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/advice6.png') }}" alt="..." /></figure>
                                <p class="fs-5 mb-4 text-justify">How to customize your message for different social networks</p>
                                <p class="fs-5 mb-4 text-justify">Conquering adversity</p>
                                <p><i>&quot;Although being a woman is my biggest challenge in this world, it has become my greatest
superpower. When people consider that might be a drawback, I use it to my advantage. I prefer
to think of it like gasoline in my engine. I take it, and I put it in the car to drive me. I&#39;m always on
the front line of activism because it drives me. All those downsides, I put it in the car, I put the
pedal to the metal to make it happen.&quot;</i></p>

                                <li><b>Guillermo Morelos, Bakersfield, CA, ULIMAR &quot;Window Cleaning and Janitorial
Services”.</b></li>
                                <figure class="mb-4 text-center"><img class="img-fluid rounded" src="{{ asset('storage/blog/advice7.png') }}" alt="..." /></figure>
                                <p class="fs-5 mb-4 text-justify">Four steps to launch you to success</p>
                                <ul>
                                  <li><b>Invest with your employees</b></li>
                                  <p>&quot;I don&#39;t want more money for my pocket. I&#39;d rather there be more money for their pockets, so
they&#39;re satisfied with their job. What I want is a good work environment. If the employees are
happy, our customers will be happy, and that has proven to be an excellent model.&quot;</p>

                                  <li><b>Knowing how to listen to customers</b></li>
                                  <p>&quot;I haven&#39;t been the one sitting in an office after getting a degree from a top business school
figuring out how to market and whatnot. That&#39;s not what it&#39;s all about. Your people will give you
the playbook.&quot;</p>

                                  <li><b>Convert customers to be the heroes of your story.</b></li>
                                  <p>&quot;People bring their time, which is the most valuable currency. And so, when we think about it, it
becomes extremely important to think about the details that they can consider, even if it&#39;s not
something we&#39;re dealing with.&quot;</p>

                                </ul>
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
