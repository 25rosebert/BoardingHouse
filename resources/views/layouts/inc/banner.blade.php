<div class="banner-search">
    <div class="container"> 
      <!-- banner -->
      <h3>Buy, Sale & Rent</h3>
      <div class="searchbar">
        <div class="row">
          <div class="col-lg-6 col-sm-6">
            <input type="text" class="form-control" placeholder="Search of Properties">
            <div class="row">
              <div class="col-lg-3 col-sm-3 ">
                <select class="form-control">
                  <option>Buy</option>
                  <option>Rent</option>
                  <option>Sale</option>
                </select>
              </div>
              <div class="col-lg-3 col-sm-4">
                <select class="form-control">
                  <option>Price</option>
                  <option>PHP 500 - PHP 50,000</option>
                  <option>PHP 51,000 - PHP 100,000</option>
                  <option> PHP100,000 - PHP 500,000</option>
                  <option>PHP 500,000 - above</option>
                </select>
              </div>
              <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                  <option>House and Lot</option>
                  <option>Boarding House</option>
                  <option>Apartment</option>
                  <option>Lot</option>
                </select>
                </div>
                <div class="col-lg-3 col-sm-4">
                {{-- <button class="btn btn-success"  onclick="window.location.href='{{route('buysalerent')}}'">Find Now</button> --}}
                </div>
            </div>
            
            
          </div>
          <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
            <p>Join now and get updated with all the properties deals.</p>
            {{-- <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>        --}}
            <a href="{{url('/login')}}" class="btn btn-info">Login</a>    
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- banner -->
