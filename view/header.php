<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>National Book Store</title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script> AOS.init(); </script>

    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <div class="container-fluid" style="margin: 0 10px;">
        <a href="#" class="navbar-brand" style="margin-right:50px;"><img src="../asset/img/logo.png" alt="" width="100px"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavbar"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/home" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="/home/about" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="/book" class="nav-link">Books</a>
            </li>
            <li class="nav-item">
              <a href="/news" class="nav-link">News</a>
            </li>
            <li class="nav-item">
              <a href="/home/contact" class="nav-link">Contact us</a>
            </li>
          </ul>
        </div>
        <form class="d-flex">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-light" type="submit" style="margin-right:20px;">Search</button>
        </form>

        <?php
          if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $img = "";
            if (isset($_SESSION['img'])) {
              $img = $_SESSION['img'] ;
            }
            echo <<< _END
              <a id="avatar" class="nav-item text-primary" href="/profile" style="text-decoration:none;">
                <span id="userLoginName">
                  <em style="color:white;">$username</em>
                  <img class="rounded-circle" style="height:50px; width:auto" src="$img">
                </span>
              </a> 
            _END;
          }
        ?>

        <!-- Login/Signup Modal -->
        <span id="loginModal">
          <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalCenter"> Đăng nhập/Đăng ký </button>
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form action="/user/login" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearLoginMessage()">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="login_username">Tài khoản:</label>
                      <input type="text" class="form-control" name="username" id="login_username" placeholder="Your username">
                    </div>
                    <div class="form-group">
                      <label for="login_password">Mật khẩu:</label>
                      <input type="password" class="form-control" name="password" id="login_password" placeholder="Your password">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div>
                      <p id="message" style='color: red'>   <?php if (!empty($_SESSION['loginmessage']) && $_SESSION['loginmessage'] != 'signout') echo $_SESSION['loginmessage'] ?> </p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                      <a href="/user/signup" style="text-decoration:none; color:white;">Chưa có tài khoản? Đăng kí</a>
                    </button>
                    <button type="submit" class="btn btn-success" name="login_button" id="login_button" >Đăng nhập</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </span>   
        
        <!-- Signout -->
        <form action="/user/signout" method="POST">
          <button type="submit" id="signout" class="btn btn-outline-light d-none" style="margin-left:10px;"> Đăng xuất </button>
        </form>

        <!-- Cart -->
        <?php 
          if (isset($_SESSION['loginmessage']) && $_SESSION['loginmessage'] == "success") {
            echo <<< _END
            <a href="/cart">
              <img id="cart" src="../asset/img/cart-logo.png" alt="Cart" width="40px" style="margin-left: 10px; cursor:pointer; filter: invert(100%); -webkit-filter: invert(100%);">
            </a>
            _END;
          } else {
            echo <<< _END
              <img id="cart" src="../asset/img/cart-logo.png" alt="Cart" width="40px" style="margin-left: 10px; cursor:pointer; filter: invert(100%); -webkit-filter: invert(100%);">
            _END;
          }
        ?>

      </div>

      <?php
        if (!isset($_SESSION['loginmessage']) || $_SESSION['loginmessage'] == '') {
          echo <<< _END
            <script>
              $(document).ready(function(){
              $("#exampleModalCenter").modal('hide');
              });
            </script>
          _END;
        } else if ($_SESSION['loginmessage'] == "success") {
          echo <<< _END
            <script>
              var LoginElement = document.getElementById("loginModal");
              LoginElement.classList.add("d-none");
              var SignoutElement = document.getElementById("signout");
              SignoutElement.classList.remove("d-none");
            </script>
          _END;
        } else if ($_SESSION['loginmessage'] == "signout") {
          echo <<< _END
            <script>
              var SignoutElement = document.getElementById("signout");
              SignoutElement.classList.add("d-none");
              var LoginElement = document.getElementById("loginModal");
              LoginElement.classList.remove("d-none");
              var AvatartElement = document.getElementById("avatar");
              AvatartElement.classList.add("d-none");
            </script>
          _END;
        } else {
          echo <<< _END
            <script>
              $(document).ready(function(){
              $("#exampleModalCenter").modal('show');
              });
            </script>
          _END;
        }
      ?>
    </nav>
    <!-- End Navbar -->
    <script>
      function clearLoginMessage() {
        $("#exampleModalCenter").modal('hide');
        <?php
          if ($_SESSION['loginmessage'] != 'success') {
            $_SESSION['loginmessage'] = '';
          }
        ?>
      }
        $('#cart').click(function(){
          $("#exampleModalCenter").modal('show');
        });
    </script>
  
