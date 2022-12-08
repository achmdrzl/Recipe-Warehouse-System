@extends('user.layout.main')

@section('content')
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#" class="contact-form">
                        <h3>Leave a Comment</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your email">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Subject">
                                <textarea placeholder="Comment"></textarea>
                            </div>
                        </div>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5988.11848484999!2d112.7627462714373!3d-7.298060666861918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa53bc20b1a1%3A0xabd54bc4c61087af!2sUniversitas%2017%20Agustus%201945%20Surabaya!5e0!3m2!1sid!2sid!4v1670327575574!5m2!1sid!2sid"
            height="550" style="border:0;" allowfullscreen=""></iframe>
        <div class="map-content set-bg" data-setbg="img/map-bg.png">
            <div class="contact-addr">
                <span>Jl. Semolowaru No. 45, Menur Pumpungan, Kec. Sukolilo, Kota SBY, Jawa Timur 60118 </span>
                <ul>
                    <li>+900 12349 999</li>
                    <li>yummy@gmail.com</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map Section End -->

    <!-- Similar Recipe Section Begin -->
    <section class="similar-recipe spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="img/cat-feature/small-7.jpg" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Italian Tiramisu with Coffe</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="img/cat-feature/small-6.jpg" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Dry Cookies with Corn</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="img/cat-feature/small-5.jpg" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Asparagus with Pork Loin and Vegetables</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="img/cat-feature/small-4.jpg" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Smoked Salmon mini Sandwiches with Onion</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Similar Recipe Section End -->
@endsection
