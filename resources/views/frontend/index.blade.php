@extends('frontend.templates.app')
@section('title', 'Global Professional Business')

@section('content')
	<div id="main-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
					<h1>Duis nec libero sed purus</h1>
					<h2>faucibus aliquet eleifend vel urna</h2>
				</div>
			</div>
		</div>
		<div class="mouse-wheel">
			<img src="{{ asset('frontend/img/mouse-wheel.svg') }}" alt="">
		</div>
	</div>
	<section id="features">
		<div class="container">
			<div class="row featured-header justify-content-center">
				<div class="col-12 col-lg-10">
					<h1>¡ENCUENTRA EL NEGOCIO QUE BUSCAS EN UN SOLO INSTANTE!</h1>
				</div>
				<div class="col-12 col-lg-10">
					<p>NGP es uno de los mayores recursos en línea dedicados a las empresas internacionales. Entregamos sus productos y servicios para ayudar a los empresarios a ser más competitivos en sus respectivas empresas, dándole un giro alrededor del mundo.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/ahorre-tiempo.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							AHORRE TIEMPO
						</h4>
						<p class="featured-description">
							Encuentra el Negocio que estás buscando con un solo click.
						</p>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/mas-ingresos.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							MÁS INGRESOS
						</h4>
						<p class="featured-description">
							El Equipo de NGP trabaja arduamente para entregar en línea marketing para las empresas.
						</p>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/profesionalismo.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							PROFESIONALISMO
						</h4>
						<p class="featured-description">
							Los dueños de Negocios pueden personalizar su página y mejorar la comercialización y la visibilidad en línea.
						</p>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/confianza.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							CONFIANZA
						</h4>
						<p class="featured-description">
							Contamos con más de cien visitantes únicos cada mes.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="team">
		<div class="container">
			<div class="row featured-header justify-content-center">
				<div class="col-12 col-lg-10">
					<h1>Nosotros</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-lg-3">
					<div class="staff">
						<div class="staff-photo">
                            <img src="{{ asset('frontend/img/ysabel-b.jpg') }}" alt="">
						</div>
						<div class="staff-name">
							Ysabel B.
						</div>
						<div class="staff-job-title">
							President
						</div>
						<ul class="staff-rrss">
							<li>
								<a href="mailto:ysabel@globalprofessionalbusiness.com" target="_blank">
									<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="staff">
						<div class="staff-photo">
                            <img src="{{ asset('frontend/img/william-d.jpg') }}" alt="">
						</div>
						<div class="staff-name">
							William D.
						</div>
						<div class="staff-job-title">
							Senior Vice-President
						</div>
						<ul class="staff-rrss">
							<li>
								<a href="mailto:williaml@globalprofessionalbusiness.com" target="_blank">
									<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
                <div class="col-12 col-lg-3">
					<div class="staff">
						<div class="staff-photo">
                            <img src="{{ asset('frontend/img/karla-p.jpg') }}" alt="">
						</div>
						<div class="staff-name">
							Karla P.
						</div>
						<div class="staff-job-title">
							Vice President, Marketing
						</div>
						<ul class="staff-rrss">
							<li>
								<a href="mailto:karlal@globalprofessionalbusiness.com" target="_blank">
									<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
                <div class="col-12 col-lg-3">
					<div class="staff">
						<div class="staff-photo">
                            <img src="{{ asset('frontend/img/estelle-e.jpg') }}" alt="">
						</div>
						<div class="staff-name">
							Estelle E.
						</div>
						<div class="staff-job-title">
							Vice President, Communications & Public Relations
						</div>
						<ul class="staff-rrss">
							<li>
								<a href="mailto:estelle@globalprofessionalbusiness.com" target="_blank">
									<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
                <div class="col-12 col-lg-3">
					<div class="staff">
						<div class="staff-photo">
                            <img src="{{ asset('frontend/img/jake-s.jpg') }}" alt="">
						</div>
						<div class="staff-name">
							Jake S.
						</div>
						<div class="staff-job-title">
							Vice President, Computer Science Engineer
						</div>
						<ul class="staff-rrss">
							<li>
								<a href="mailto:jakel@globalprofessionalbusiness.com" target="_blank">
									<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
                <div class="col-12 col-lg-3">
					<div class="staff">
						<div class="staff-photo">
                            <img src="{{ asset('frontend/img/kimberly-s.jpg') }}" alt="">
						</div>
						<div class="staff-name">
							Kimberly S.
						</div>
						<div class="staff-job-title">
							Vice President, Civil Engineer
						</div>
						<ul class="staff-rrss">
							<li>
								<a href="mailto:kiml@globalprofessionalbusiness.com" target="_blank">
									<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
                <div class="col-12 col-lg-3">
					<div class="staff">
						<div class="staff-photo">
                            <img src="{{ asset('frontend/img/bryan-x.png') }}" alt="">
						</div>
						<div class="staff-name">
							Bryan X. G.
						</div>
						<div class="staff-job-title">
							Business Economist
						</div>
						<ul class="staff-rrss">
							<li>
								<a href="mailto:bryanl@globalprofessionalbusiness.com" target="_blank">
									<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section id="clients">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>Empresas que confían en Nosotros</h1>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="owl-carousel owl-clients">
                        @foreach ($enterprises as $enterprise)
                            <div class="item">
                                <img src="{{ asset('storage/'.$enterprise->portrait_image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="countries">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>Actualmente estamos en estos Países</h1>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="countries--element">
                        <div class="element--photo">
                            <img src="{{ asset('frontend/img/peru.jpg') }}" alt="">
                        </div>
                        <div class="element--name">
                            Perú
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="countries--element">
                        <div class="element--photo">
                            <img src="{{ asset('frontend/img/usa.jpg') }}" alt="">
                        </div>
                        <div class="element--name">
                            U.S.A.
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="countries--element">
                        <div class="element--photo">
                            <img src="{{ asset('frontend/img/colombia.jpg') }}" alt="">
                        </div>
                        <div class="element--name">
                            Colombia
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="countries--element">
                        <div class="element--photo">
                            <img src="{{ asset('frontend/img/china.jpg') }}" alt="">
                        </div>
                        <div class="element--name">
                            China
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="countries--element">
                        <div class="element--photo">
                            <img src="{{ asset('frontend/img/espana.jpg') }}" alt="">
                        </div>
                        <div class="element--name">
                            España
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="countries--element">
                        <div class="element--photo">
                            <img src="{{ asset('frontend/img/chile.jpg') }}" alt="">
                        </div>
                        <div class="element--name">
                            Chile
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="countries--element">
                        <div class="element--photo">
                            <img src="{{ asset('frontend/img/mexico.jpg') }}" alt="">
                        </div>
                        <div class="element--name">
                            México
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>Nuestros Clientes no pueden vivir sin nosotros</h1>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="owl-carousel owl-testimonials">
                        @foreach ($testimonials as $testimonial)
                            <div class="item">
                                <div class="item--content">
                                    {{ $testimonial->content }}
                                </div>
                                <div class="item--profile">
                                    <div class="profile--img">
                                        <img src="{{ asset('storage/'.$testimonial->portrait_image) }}" alt="">
                                    </div>
                                    <div class="profile--name">
                                        {{ $testimonial->title }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="testimonials--img">
                        <img src="{{ asset('frontend/img/testimonios.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="plans">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>Comience a captar más Clientes</h1>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-free">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Gratis
                            </div>
                            <div class="plan--header-price">

                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Incluye:
                            </div>
                            <ul class="plan--include-list">
                                <li>1 mes gratis</li>
                                <li>Publica tu negocio por 1 mes gratis</li>
                                <li class="disabled">Tu negocio en las primeras búsquedas</li>
                            </ul>
                        </div>
                        <div class="plan--cta">
                            <a href="#">Regístrate</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-basic">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Básico
                            </div>
                            <div class="plan--header-price">
                                25$
                                <small>mensuales</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Incluye:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publica tu negocio y obtén 1 mes gratis</li>
                                <li class="disabled">Tu negocio en las primeras búsquedas</li>
                            </ul>
                        </div>
                        <div class="plan--cta">
                            <a href="#">Regístrate</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-premium">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Premium
                            </div>
                            <div class="plan--header-price">
                                200$
                                <small>anuales</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Incluye:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publica tu negocio y obtén 1 mes gratis</li>
                                <li>Tu negocio en las primeras búsquedas</li>
                            </ul>
                        </div>
                        <div class="plan--cta">
                            <a href="#">Regístrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact-us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>Eestamos felices por saber de ti</h1>
                </div>
                <div class="col-12 col-lg-7">
                    <contact-form
                        :url="'{{ route('frontend.send_message') }}'"
                        :countries="{{ $countries }}"
                    ></contact-form>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="contact-us--company">
                        <div class="company--title">
                            Global Professional Business (GPB) Offices
                        </div>
                        <div class="company--address">
                            <p>S/N Center Dr</p>
                            <p>Irvine, CA 92618</p>
                            <p>USA</p>
                        </div>
                        <ul class="company--phones">
                            <li>
                                <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">Linea Central</div>
                                    <a href="tel:+19494680112" class="phone-numer">1-949-468-0112</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">Peru - Central</div>
                                    <a href="tel:+51017073802" class="phone-numer">51-707-3802</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">Skype International</div>
                                    <a href="tel:+19494780844" class="phone-numer">1-949-478-0844</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/whatsapp.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">WhatsApp Global</div>
                                    <a href="wa.link/04lo4r" target="_blank" class="phone-numer">1-949-748-0339</a>
                                </div>
                            </li>
                        </ul>
                        <div class="company--directory">
                            <div class="company--directory-title">
                                Directorio GPB:
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="directory--info">
                                    <div class="directory--title">
                                        Directa informacion:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:info@globalprofessionalbusiness.com">info@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        Cancelación:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:cancellation@globalprofessionalbusiness.com">cancellation@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        Reclamación:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:claims@globalprofessionalbusiness.com">claims@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        Market - Mercado:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:marketing@globalprofessionalbusiness.com">marketing@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        Director Ejecutivo:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:ceo@globalprofessionalbusiness.com">ceo@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
