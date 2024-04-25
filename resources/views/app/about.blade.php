@extends('layouts.app.main')
@section('content')
    <section id="aboutUs">
        <div class="container">
            <div class="heading text-left">
                <div class="wel_line" style='margin-top:30px;'>
                    <center>
                        <h3>WELCOME TO AZIR Cinema </h3>
                    </center>
                </div>
            </div>
            <div class="row feature design">

                <div class="area1 columns left">

                    <h5>AZIR Cinema is the most recognisable film exhibition brands in the country which has high standards
                        of ‘Luxury’, ‘Service’ & ‘Technology’.</h5>
                    <p>Currently with a Cinema circuit of 450 + screens spread across 100+ properties covering 100+ cities
                        across the country.
                        The best thing about using it is the simplicity and ease with which a person can book the tickets
                        online.Coming from Chennai, that has a rich legacy of cinema, we are a theatre chain with a passion
                        for experiences and an even bigger passion to share them with our customers. We understand the joy
                        of watching our favourite stories come alive on the big screen, and believe that it is our duty to
                        go the extra mile to make this experience as immersive as we possibly can!
                        The company was instrumental in bringing computer-based digital non-linear editing to India with
                        Avid Technology, transforming the industry and forever changing the way Indian film and television
                        programs were edited. The company subsequently brought digital cinema sound to India with DTS and
                        helped Indian cinema leapfrog a generation, form mono sound directly to digital.
                        <br>
                        It is available for 24 X 7 hours.
                    </p>

                </div>
                <div class="area2 columns feature-media left"><img
                        src="{{ asset('template/app/images/Online-Movie-Ticket-Booking-Banner-1-1280x720.jpg') }}"
                        alt="" width="100%">
                </div>
            </div>

        </div>

    </section>
    <div class="dvCapacity">

        <div class="CapacityHead">
            SERVING HAPPINESS


        </div>
        <div class="CapHorizon">
        </div>
        <div class="PatronStruc">
            <div class="row">


                <div class="col-md-4">

                    <div class="dvPatron">
                        <img src="{{ asset('template/app/images/hall.jpg') }}" class="resize" alt="#" />

                    </div>

                    <div class="dvPatConetnt">
                        <div class="dvPatronDesc">
                            <div class="dvPatronDescHead">
                                Luxury

                            </div>
                            <div class="dvPatronDescText">
                                Inox theater is a leading chain of multiplex spread over Gujarat.The multiplex shows Hindi
                                and English movies. It caters best in class cinematic experience to its patrons.
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">

                    <div class="dvPatron">
                        <img src="{{ asset('template/app/images/food.jpg') }}" alt="#" />

                    </div>
                    <div class="dvPatConetnt">
                        <div class="dvPatronDesc">
                            <div class="dvPatronDescHead">
                                Service
                            </div>
                            <div class="dvPatronDescText">
                                Weekend popcorn,cold drinks,snacks and 'masala' on screen.We are committed to provide our
                                guests with an unparalleled cinema journey, which is underlined by the warmth of our top
                                notch service
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="dvPatron">
                        <img src="{{ asset('template/app/images/audience.jpg') }}" class="resize" alt="#" />

                    </div>
                    <div class="dvPatConetnt">
                        <div class="dvPatronDesc">
                            <div class="dvPatronDescHead">
                                Technology
                            </div>
                            <div class="dvPatronDescText">
                                Be it projection &
                                sound or our advanced cinema formats or reservations, check-ins & food ordering, we aim to
                                amplify your experience with the finest use of technology


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
