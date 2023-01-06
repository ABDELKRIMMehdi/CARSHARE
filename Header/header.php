
<div id ="headercontainer">
    <div id="header1">
      <div id="header">
        <div class= "logo">
          <div class="image"></div>
          <h1>CARSHARE</h1><p>.com</p>
        </div>
    <?php
    if(isset($_SESSION["id"])){
      if($_SESSION["id"] == 1 ){
       echo "<div id='userButtonConn'>
        <ul style='list-style: none; padding: 0px;'>
          <li class='dropConn'>
            <div style='display: flex;'><div class='user-avatar'><img src='../Header/images/userpic.png'></div> <a href=''><p>" . $_SESSION["firstname"] . "</p></a> <div id=
            'arrowDownConn'></div></div>
            <div class='dropdownContainConn'>
              <div class='dropOutConn'>
                <ul>
                  <li><span></span> <a href='../Header/Admin/adminAccount.php'>ADMIN PANEL</a></li>
                  <li><span></span> <a href='../Header/Admin/myAdminAccount.php'>My Rides</a></li>
                  <li><span ></span> <a href='../Header/logout.inc.php'>Log Out</a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
       </div>";
      }else{
      echo "<div id='userButtonConn'>
        <ul style='list-style: none; padding: 0px;'>
          <li class='dropConn'>
            <div style='display: flex;'><div class='user-avatar'><img src='../Header/images/userpic.png'></div> <a href=''><p>" . $_SESSION["firstname"] . "</p></a> <div id=
            'arrowDownConn'></div></div>
            <div class='dropdownContainConn'>
              <div class='dropOutConn'>
                <ul>
                  <li><span></span> <a href='../Header/UserAccount/UserAccount.php'>My Account</a></li>
                  <li><span ></span> <a href='../Header/logout.inc.php'>Log Out</a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>";
    }
  }else{
      echo "<div id='userButton'>
      <ul style='list-style: none; padding: 0px;'>
        <li class='drop'>
          <div style='display: flex;'><div class='user-avatar'><img src='../Header/images/userpic.png'></div> <a href=''><p>Anonymous</p></a> <div id=
          'arrowDown'></div></div>
          <div class='dropdownContain'>
            <div class='dropOut'>
              <ul>
                <li><span></span> <a href='../SignUp/SignUp.php'>Sign Up</a></li>
                <li><span></span> <a href='../Login/Login.php'>Log In</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
  </div>";
    }?>
    
    <nav id="menu">
        <div class="menu-item" id="homeitem">
            <div class="menu-text">
                <a href='../HOME/home.php' id='home'>Home</a>";
            </div>
        </div>
        <div class="menu-item" id="Offeritem">
            <div class="menu-text">
                <a <?php if(isset($_SESSION["id"])){
               echo " href='../OfferARide/Offer.php' id='Offer'>Offer a ride</a>";
                }else{
                  echo "  target='_blank'  href='../Login/Login.php' id='Offer'>Offer a ride</a>";
                }?>
            </div>
        </div>
        <div class="menu-item" id="Joinitem">
            <div class="menu-text">
                <a href='../SearchForARide/search.php' id='Join'>Join a ride</a>
            </div>
        </div>
        <div id="selector"></div>
    </nav>
  </div>
    <div id="banner">
            <div id="overlay">
                <h1 id="overlayTitle"></h1>
                <P id="overlayDesc"></P>
            </div>
    </div>

  </div>
  <div id="header2">
  <div class="btn">
         <span class="fas fa-bars"></span>
      </div>
      <nav class="sidebar">
      <div class= "logo" style="margin-left: 30px;">
          <div class="image"></div>
          <h1>CARSHARE</h1>
        </div>
         <ul>
            <li class="active"><a href='../HOME/home.php' id='home'>Home</a>";
            </li>
            <li><a <?php if(isset($_SESSION["id"])){
               echo " href='../OfferARide/Offer.php' id='Offer'>Offer a ride</a>";
                }else{
                  echo "  target='_blank'  href='../Login/Login.php' id='Offer'>Offer a ride</a>";
                }?></li>
            <li><a href='../SearchForARide/search.php' id='Join'>Join a ride</a> </li>
            <?php
            if(isset($_SESSION["id"])){
              if($_SESSION["id"] == 1 ){
                echo"<li>
              <span class='feat-btn'>".$_SESSION["firstname"]."
              <span class='fas fa-caret-down first'></span>
              </span>
              <ul class='feat-show'>
              <li><span></span> <a  href='../Header/Admin/adminAccount.php'>ADMIN PANEL</a></li>
              <li><span></span> <a  href='../Header/Admin/myAdminAccount.php'>My Rides</a></li>
              <li><span ></span> <a href='../Header/logout.inc.php'>Log Out</a></li>
              </ul>
           </li>
            ";
              }else{
                echo"<li>
              <span class='feat-btn'>".$_SESSION["firstname"]."
              <span class='fas fa-caret-down first'></span>
              </span>
              <ul class='feat-show'>
              <li><span></span> <a href='../Header/UserAccount/UserAccount.php'>My Account</a></li>
              <li><span ></span> <a href='../Header/logout.inc.php'>Log Out</a></li>
              </ul>
           </li>
            ";
              }
            }else{
              echo"<li>
              <span class='feat-btn'>Anonymous
              <span class='fas fa-caret-down first'></span>
              </span>
              <ul class='feat-show'>
                 <li><a href='../Login/Login.php'>Log In</a></li>
                 <li><a href='../SignUp/SignUp.php'>Sign Up</a></li>
              </ul>
           </li>
            ";}
            ?>
         </ul>
      </nav>
      <div class="content">
      </div>
      <script>
         $('.btn').click(function(){
           $(this).toggleClass("click");
           $('.sidebar').toggleClass("show");
         });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn').click(function(){
             $('nav ul .serv-show').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('nav ul li').hover(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>
  </div>

          </div>