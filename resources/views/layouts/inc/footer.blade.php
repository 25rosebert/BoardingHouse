<footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        <ul>
          <li>
            <a href="{{url('/homepage')}}">
              Welcome Page
            </a>
          </li>
          <li>
            <a href="{{url('/about')}}">
              About Us
            </a>
          </li>
          <li>
            <a href="{{url('/contact')}}">
              Contact Us
            </a>
          </li>
          <li>
            <a href="{{url('/agents')}}">
              Agents
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy; 
        <script>
            document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
         <a href="{{url('/')}}" target="_blank">Property_Finder</a> for more efficient of finding properties
      </div>
    </div>
  </footer>
