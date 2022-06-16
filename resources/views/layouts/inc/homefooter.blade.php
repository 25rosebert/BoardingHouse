{{-- new footer --}}
<footer>
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#1a250e" fill-opacity="1" d="M0,192L80,186.7C160,181,320,171,480,165.3C640,160,800,160,960,170.7C1120,181,1280,203,1360,213.3L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
          </path>
        </svg>   -->
        <div class="container">
          <a href="#home">
            <img class="footer-img" src="{{asset('frontend/images/logo-green.png')}}" alt="logo">
        </a>
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{route('showMap')}}">Map</a></li>
            <li><a href="{{url('/policy')}}">Privacy Policy</a></li>
            <li><a href="{{url('/contact')}}">Contact us</a></li>
        </ul>
        <div class="copyright">
            <h4 class="text-light">Made with <span>❤</span> by Group 5</h4>
        </div>
        </div>
</footer>




{{-- 
<div class="footer">

    <div class="container">
    <div class="row">
                <div class="col-lg-3 col-sm-3">
                       <h4>Information</h4>
                       <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.php">About</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Agents</a></li>         
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.php">Blog</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.php">Contact</a></li>
                  </ul>
                </div>
                
                <div class="col-lg-3 col-sm-3">
                        <h4>Newsletter</h4>
                        <p>Get notified about the latest properties in our marketplace.</p>
                        <form class="form-inline" role="form">
                                <input type="text" placeholder="Enter Your email address" class="form-control">
                                    <button class="btn btn-success" type="button">Notify Me!</button></form>
                </div>
                
                <div class="col-lg-3 col-sm-3">
                        <h4>Follow us</h4>
                        <a href="#"><img src="frontend/images/facebook.png" alt="facebook"></a>
                        <a href="#"><img src="frontend/images/twitter.png" alt="twitter"></a>
                        <a href="#"><img src="frontend/images/linkedin.png" alt="linkedin"></a>
                        <a href="#"><img src="frontend/images/instagram.png" alt="instagram"></a>
                </div>
    
                 <div class="col-lg-3 col-sm-3">
                        <h4>Contact us</h4>
                        <p><b>Alaminos City Hall</b><br>
    <span class="glyphicon glyphicon-map-marker"></span> Poblacion Alaminos City<br>
    <span class="glyphicon glyphicon-envelope"></span> alaminos.city@gmail.com<br>
    <span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p>
                </div>
            </div>
    <p class="copyright">Copyright 2021. All rights reserved.	</p>
    
    
    </div></div>
     --}} 