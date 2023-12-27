@extends('front.layouts.layouts')

@section('content')
<!-- contact section start -->
<section class="contact" style="padding-top: 218px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <h1>Keep in Touch</h1>
                    <div class="info-item">
                        <h4>phone</h4>
                        <ul class="ps-0">
                            <li>
                                <a href="tel:+22254362524">+ 22 254 362 52 4</a>
                            </li>
                            <li>
                                <a href="tel:+22254362524">+ 22 254 362 52 4</a>
                            </li>
                        </ul>
                    </div>
                    <div class="info-item">
                        <h4>Email</h4>
                        <ul class="ps-0">
                            <li>
                                <a href="mailto:Sbinazhar671@gmail.com">Sbinazhar671@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="info-item">
                        <h4>Address</h4>
                        <ul class="ps-0">
                            <li>
                                <a href="#">Dhaka: 252 W 43rd St New York, NY Bangladesh</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-item">
                    <h3>Do you have any question?</h3>
                    <div class="form-info">
                        <form action="">
                            <input class="half" type="text" placeholder="Name">
                            <input class="half" type="email" placeholder="Email">
                            <input type="text" placeholder="Subject">
                            <textarea placeholder="Message"></textarea>
                            <button>Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section end -->
@endsection