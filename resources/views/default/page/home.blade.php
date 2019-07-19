@extends('default.layouts.master')

@section('page-title')
    <title>EZY - Home</title>
@stop

@section('header')
    @include('default.includes.header')
@stop

@section('body')
    <div class="HomeSlider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('default/assets/images/Slider/indirect_tax.png')  }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('default/assets/images/Slider/My-Post-1.jpg')  }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('default/assets/images/Slider/VAT-Consulting-Diagram-1024x481.png')  }}"
                         alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="our-service-area">
        <div class="custom-container">
            <div class="section-heading">
                <h2 class="">Our Service</h2>
            </div>
            <div class="row our-service section-padding">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12  mb-4">
                    <div class="service-content">
                        <div class="sub-title">
                            <h4 class="mb-2">Vat</h4>
                        </div>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, corporis
                            doloribus ex facere, laudantium nostrum numquam officia quas, quod rerum sint suscipit veniam?
                            Animi ea facilis nulla quas saepe?</p>
                        <a class="btn btn-sm btn-success" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-content">
                        <div class="sub-title">
                            <h4 class="mb-2">Tax</h4>
                        </div>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, corporis
                            doloribus ex facere, laudantium nostrum numquam officia quas, quod rerum sint suscipit veniam?
                            Animi ea facilis nulla quas saepe?</p>
                        <a class="btn btn-sm btn-success" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-content">
                        <div class="sub-title">
                            <h4 class="mb-2">Legal Complaince</h4>
                        </div>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, corporis
                            doloribus ex facere, laudantium nostrum numquam officia quas, quod rerum sint suscipit veniam?
                            Animi ea facilis nulla quas saepe?</p>
                        <a class="btn btn-sm btn-success" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-content">
                        <div class="sub-title">
                            <h4 class="mb-2">Professional Traning</h4>
                        </div>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, corporis
                            doloribus ex facere, laudantium nostrum numquam officia quas, quod rerum sint suscipit veniam?
                            Animi ea facilis nulla quas saepe?</p>
                        <a class="btn btn-sm btn-success" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-content">
                        <div class="sub-title">
                            <h4 class="mb-2">Risk Consulting</h4>
                        </div>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, corporis
                            doloribus ex facere, laudantium nostrum numquam officia quas, quod rerum sint suscipit veniam?
                            Animi ea facilis nulla quas saepe?</p>
                        <a class="btn btn-sm btn-success" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-content">
                        <div class="sub-title">
                            <h4 class="mb-2">Others Professional Service</h4>
                        </div>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, corporis
                            doloribus ex facere, laudantium nostrum numquam officia quas, quod rerum sint suscipit veniam?
                            Animi ea facilis nulla quas saepe?</p>
                        <a class="btn btn-sm btn-success" href="#">Read More</a>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="team-area">
        <div class="custom-container">
            <div class="section-heading">
                <h2 class="">OUR EXPERIENCED TEAM</h2>
            </div>
            <div class="row section-padding">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="team">
                        <div class="team-header">
                            <img class="w-100"
                                 src="{{ asset('default/assets/images/team-member/smiling-young-pretty-woman-looking-camera-touching-face_1262-15253.jpg')  }}"
                                 alt="">
                        </div>
                        <div class="team-body ">
                            <div class="name mb-1">
                                <h5>Kamrunnahar Bithi</h5>
                            </div>
                            <div class="designation mb-2">
                                <p>Software Developer</p>
                            </div>
                            <div class="description mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos doloremque eius
                                    harum sapiente voluptates! Adipisci at autem consequuntur corporis doloremque, ducimus
                                    enim facilis illo in odio recusandae reiciendis, veniam, voluptatum!</p>
                            </div>

                            <ul class="list-unstyled text-center">
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="team">
                        <div class="team-header">
                            <img class="w-100" src="{{ asset('default/assets/images/team-member/photo-1507003211169-0a1dd7228f2d.jpg')  }}" alt="">
                        </div>
                        <div class="team-body ">
                            <div class="name mb-1">
                                <h5>Salman Khan</h5>
                            </div>
                            <div class="designation mb-2">
                                <p>Software Developer</p>
                            </div>
                            <div class="description mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos doloremque eius
                                    harum sapiente voluptates! Adipisci at autem consequuntur corporis doloremque, ducimus
                                    enim facilis illo in odio recusandae reiciendis, veniam, voluptatum!</p>
                            </div>

                            <ul class="list-unstyled text-center">
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="team">
                        <div class="team-header">
                            <img class="w-100" src="{{ asset('default/assets/images/team-member/smile-1726471_960_720.jpg')  }}" alt="">
                        </div>
                        <div class="team-body ">
                            <div class="name mb-1">
                                <h5>Sarkar Sabbir</h5>
                            </div>
                            <div class="designation mb-2">
                                <p>Vat & Tax Specilist</p>
                            </div>
                            <div class="description mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos doloremque eius
                                    harum sapiente voluptates! Adipisci at autem consequuntur corporis doloremque, ducimus
                                    enim facilis illo in odio recusandae reiciendis, veniam, voluptatum!</p>
                            </div>

                            <ul class="list-unstyled text-center">
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="team">
                        <div class="team-header">
                            <img class="w-100" src="{{ asset('default/assets/images/team-member/max-galka.jpg')  }}" alt="">
                        </div>
                        <div class="team-body ">
                            <div class="name mb-1">
                                <h5>Munni</h5>
                            </div>
                            <div class="designation mb-2">
                                <p>Software Developer</p>
                            </div>
                            <div class="description mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos doloremque eius
                                    harum sapiente voluptates! Adipisci at autem consequuntur corporis doloremque, ducimus
                                    enim facilis illo in odio recusandae reiciendis, veniam, voluptatum!</p>
                            </div>

                            <ul class="list-unstyled text-center">
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block">
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-area">
        <div class="custom-container">
            <div class="section-heading">
                <h2 class="">Testimonial</h2>
            </div>
            <div class="owl-slider section-padding">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('default/assets/images/team-member/max-galka.jpg')  }}" alt="">
                            </div>
                            <div class="col-10">
                                <div class="quotation">
                                    <p><i class="fas fa-quote-left"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi, architecto
                                        beatae blanditiis consequatur cumque deleniti doloribus ducimus eos inventore,
                                        laboriosam minus molestiae nemo optio provident sit sunt tempore voluptatum.
                                        <i class="fas fa-quote-right"></i>
                                    </p>
                                    <h5 class="text-right">Korim</h5>
                                    <p class="text-right">Lorem ipsum dolor sit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('default/assets/images/team-member/smile-1726471_960_720.jpg')  }}" alt="">
                            </div>
                            <div class="col-10">
                                <div class="quotation">
                                    <p class="mb-4"><i class="fas fa-quote-left"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi, architecto
                                        beatae blanditiis consequatur cumque deleniti doloribus ducimus eos inventore,
                                        laboriosam minus molestiae nemo optio provident sit sunt tempore voluptatum.
                                        <i class="fas fa-quote-right"></i>
                                    </p>
                                    <h5 class="text-right">Korim</h5>
                                    <p class="text-right">Lorem ipsum dolor sit</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="suggestion-area">
        <div class="custom-container">
            <div class="section-heading">
                <h2 class="">HAVE ANY QUERY OR SUGGESSTIONS</h2>
            </div>
            <div class="row suggestion section-padding">
                <div class="col-md-6">
                    <div class="sub-title">
                        <h4 class="mb-2">Contact Us</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam consectetur consequatur esse
                            facere in ipsa itaque iure porro quaerat qui recusandae reiciendis temporibus voluptate,
                            voluptates! Facilis ipsam placeat vitae.</p>
                        <br>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam consectetur consequatur esse
                            facere in ipsa itaque iure porro quaerat qui recusandae reiciendis temporibus voluptate,
                            voluptates! Facilis ipsam placeat vitae.</p>

                        <br>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam consectetur consequatur esse
                            facere in ipsa itaque iure porro quaerat qui recusandae reiciendis temporibus voluptate,
                            voluptates! Facilis ipsam placeat vitae.</p>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="suggestion-from">
                        <form action="#">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                       placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email"
                                       placeholder="Your Email">
                                <div class="form-group">
                                    <label for="Subject">Subject</label>
                                    <input type="text" class="form-control form-control-sm" id="Subject"
                                           placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea placeholder="Your Message" id="message" class="form-control form-control-sm"></textarea>
                                </div>

                                <input type="submit" class="form-control form-control-sm btn btn-sm btn-success " value="Send">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('default.includes.footer')
@stop


