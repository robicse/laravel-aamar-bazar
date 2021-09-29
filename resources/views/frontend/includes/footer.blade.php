<footer class="ps-footer" style="background: #26262F!important;">
    <div class="ps-container">
        <div class="ps-footer__widgets">
            <aside class="widget widget_footer widget_contact-us">
                <div class="widget-title">
                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat-final.png')}}" alt=""></a>
                </div>
                <div class="widget_content mt-4">
                    <h3>01820001999</h3>
                    <p>707/1, Ashidag, West Ibrahimpur, Kafrul, Dhaka - 1206</p>

                </div>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Quick links</h4>
                <ul class="ps-list--link">
                    <li><a href="{{route('blog-list')}}">Blogs</a></li>


                    <li><a href="{{route('policy')}}">Policy</a></li>
                    <li><a href="{{route('terms-condition')}}">Term & Condition</a></li>

                    <li><a href="{{route('faqs')}}">FAQs</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Company</h4>
                <ul class="ps-list--link">
                    <li><a href="{{route('about-us')}}">About Us</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Bussiness</h4>
                <ul class="ps-list--link">
                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                    <li><a href="{{route('login')}}">My account</a></li>
{{--                    <li><a href="{{route('all.shops')}}">Shops</a></li>--}}
                </ul>
                <div class="widget widget_footer">
                    <h4 class="" style="color: #cacacc!important;">BE A SELLER</h4>
                    <button type="submit" class="btn btn-lg btn-success"><a href="{{route('seller.registration')}}"> Apply Now</a></button>
                </div>
            </aside>
        </div>
        <div class="ps-footer__right" style="padding-bottom: 0px;">
            <aside>
                <ul class="ps-list--social text-center my-3 my-md-0" style="padding-bottom: 40px;">
                    <li><a class="facebook" href="https://www.facebook.com/mudihatbd/" target="_blank" data-toggle="tooltip" data-original-title="Facebook" style="background: #3b579d;"><i class="fab fa-facebook-f" style="color: white"></i></a></li>
                    <li><a class="twitter" href="#" target="_blank" data-toggle="tooltip" data-original-title="Twitter" style="background: #50ABF1;"><i class="fab fa-twitter" style="color: white"></i></a></li>
                    <li><a class="youtube" href="https://youtube.com/channel/UCO8rNaLfnnEE7Ya_0oGeVVg" target="_blank" data-toggle="tooltip" data-original-title="YouTube" style="background: #E62117;"><i class="fab fa-youtube" style="color: white"></i></a></li>
                    <li><a class="instagram" href="#" target="_blank" data-toggle="tooltip" data-original-title="Instagram" style="background: #e1306c"><i class="fab fa-instagram" style="color: white"></i></a></li>
                    <li><a class="linkedin" href="https://www.linkedin.com/in/mudi-hat-62886821b" target="_blank" data-toggle="tooltip" data-original-title="Linked In" style="background: #0278B0;"><i class="fab fa-linkedin" style="color: white"></i></a></li>
                   <a href="https://play.google.com/store/apps/details?id=com.starit.mudihat"><img src="{{asset('frontend/img/google-play.png')}}" alt="" ></a>
                </ul>
            </aside>
        </div>
    </div>
</footer>
