@extends('frontend.templates.app')
@section('title', 'Reviews | Global Professional Business')

@section('content')
    <div id="reviews-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Reviews</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <div class="reviews-content">
        <main>
            <div class="row">
                <div class="col-lg-6 d-flex flex-column p-5 justify-content-center align-items-center">
                    <h1 class="display-6">GPB Business Reviews</h1>

                    <p class="text-justify"><b>Our customers can't live without us!</b> Look at some current reviews of GPB. Customers who use our services every day.</p>
                    <p class="text-justify">We mustbe proud. And we learn from all our  reviews, for continuos improvement of our products and services.</p>
                </div>
                <div class="col-lg-6 image"  style="background-image: url('frontend/img/about-business.jpeg')">
                        {{-- <img src="" style="max-width:100%; max-height:100%; object-fit:cover" class="figure-img img-fluid rounded" alt="..."> --}}
                        <!--<figcaption class="figure-caption">A caption for the above image.</figcaption>-->
                </div>
            </div>
        </main>
        <section class="bg-comments pt-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="pb-4 w-75">

                        <h2 class="h4 font-weight-bold text-center pb-4">See What Our Customers Are Saying About GPB</h2>

                        <div class="comment mt-4 text-justify"> 
                            <div class="comment__header d-flex">
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="mr-2 rounded-circle" width="40" height="40">
                                <div>
                                    <div class="d-flex">
                                        <p class="text-dark font-weight-bold h6 p-0 m-0">Jhon Doe</p> 
                                        <span>- 20 October, 2018</span>
                                    </div>
                                    <div class="self-start">
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="comment__content">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                            </div>
                        </div>

                        <div class="comment mt-4 text-justify"> 
                            <div class="comment__header d-flex">
                                <img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="mr-2 rounded-circle" width="40" height="40">
                                <div>
                                    <div class="d-flex">
                                        <p class="text-dark font-weight-bold h6 p-0 m-0">Rob Simpson</p> 
                                        <span>- 20 October, 2018</span>
                                    </div>
                                    <div class="self-start">
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="comment__content">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                            </div>
                        </div>

                        <div class="comment mt-4 text-justify"> 
                            <div class="comment__header d-flex">
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="mr-2 rounded-circle" width="40" height="40">
                                <div>
                                    <div class="d-flex">
                                        <p class="text-dark font-weight-bold h6 p-0 m-0">Jhon Doe</p> 
                                        <span>- 20 October, 2018</span>
                                    </div>
                                    <div class="self-start">
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="comment__content">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                            </div>
                        </div>

                        <div class="comment mt-4 text-justify"> 
                            <div class="comment__header d-flex">
                                <img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="mr-2 rounded-circle" width="40" height="40">
                                <div>
                                    <div class="d-flex">
                                        <p class="text-dark font-weight-bold h6 p-0 m-0">Rob Simpson</p> 
                                        <span>- 20 October, 2018</span>
                                    </div>
                                    <div class="self-start">
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                        <i class="fa fa-star text-m-yellow"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="comment__content">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="font-weight-bold h3 text-dark">Any Questions?</p>
                        <p>We're here to help. Get in touch with a GPB Specialist today</p>
                    </div>
                    <div class="col-lg-6">
                            <div class="comment__header d-flex justify-content-center">
                                <img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="mr-2 rounded-circle" width="60" height="60">
                                <div>
                                    <p class="text-dark font-weight-bold h3 p-0 m-0">1-949-478-0844 Skype</p> 
                                    <span>Monday - friday, 9am - 6pm EST</span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection