<aside class="wrap-sidebar js-sidebar">
  <div class="s-full js-hide-sidebar"></div>

  <div class="sidebar flex-col-l p-t-22 ">
    <div class="flex-r w-full p-b-30 p-r-27">
      <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
        <i class="zmdi zmdi-close"></i>
      </div>
    </div>
    <?php
    if (isset($_SESSION['user'])) { ?>
      <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll" style="margin-top: -30px">

        <div class="sidebar-gallery w-full p-tb-30 m-t-20" style="text-align: center;">

          <div class="flex-w flex-sb  gallery-lb" style="background-color: #333 !important;width: 390px;margin-left: -65px;height: 100px;box-shadow: 1px 5px 20px 1px #333">
            <!-- item gallery sidebar -->
            <div class="wrap-item-gallery " style="text-align: center;">
              <a class=" bg-img1" href="assets/images/<?php echo (!empty($user['foto'])) ? $user['foto'] : 'profile.jpg' ?>" data-lightbox="gallery" style="margin-left: 100%">
                <img src="assets/images/<?php echo (!empty($user['foto'])) ? $user['foto'] : 'profile.jpg' ?>" width="160" height="160" style="position: absolute;border-radius: 100px;margin-top: -30px;box-shadow: 1px 5px 20px 1px #333;border:2px solid #fff">
              </a>
            </div>
          </div>
          <div class="m-b-50"></div>
          <span class="mtext-101 cl5 ">
            <?php echo (!empty($user['namadepan'])) ? $user['namadepan'] . ' ' . $user['namabelakang'] : $user['username'] ?>
          </span>

        </div>

        <div class="sidebar-gallery ">
          <ul class="sidebar-link w-full">

            <li class="p-b-13">
              <a href="index.php?View=profile" class="stext-102 cl2 hov-cl1 trans-04">
                My Account
              </a>
            </li>
            <li class="p-b-13">
              <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                Transaction
              </a>
            </li>
            <li class="p-b-13">
              <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                Change Password
              </a>
            </li>
            <li class="p-b-13">
              <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                My Wishlist
              </a>
            </li>
          </ul>
        </div>
        <ul class="sidebar-link w-full">

          <li class="p-b-13" style="background-color: #333 !important;width: 390px;margin-left: -65px;color: #fff;text-align: center;padding-top: 10px">
            <a href="proses/logout.php" class="stext-102 cl2 hov-cl1 trans-04" style="color: #fff;margin-top: 10px">
              Logout
            </a>
          </li>


        </ul>
      </div>
      <div class="sidebar-content flex-w w-full ">
        <div class="flex-w flex-sb  gallery-lb" style="background-color: #333 !important;width: 400px;margin-left: 0px;height: 100px;box-shadow: 1px 5px 20px 1px #333">
          <!-- item gallery sidebar -->
          <div class="wrap-item-gallery " style="margin-left: 30%">
            <h4 class="mtext-105 cl2 txt-center p-b-30" style="position: absolute;border-radius: 100px;margin-top: -30px;box-shadow: 1px 5px 20px 1px #333;border:2px solid #fff;background-color: #333;color: #fff; height: 160px;width: 160px;padding-top: 55px;font-size: 30px">
              <b>L O G I N</b>
            </h4>
          </div>
        </div>
        <div class="m-b-70"></div>


        <div class="sidebar-gallery ">
          <form action="proses/validasi" method="POST" style="width: 350px;margin-left: 20px;">

            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Your Username" required>
              <img class="how-pos4 pointer-none" src="assets/images/icons/icon-email.png" alt="ICON">
            </div>

            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="Password" name="password" placeholder="Your Password" required>
              <img class="how-pos4 pointer-none" src="assets/images/icons/key.png" alt="ICON">
            </div>
            <ul class="sidebar-link w-full m-b-15">
              <li class="p-b-13">
                <a href="index.php?View=register" class="stext-102 cl2 hov-cl1 trans-04">
                  Belum Memiliki Akun
                </a>
              </li>
            </ul>


            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="login">
              Submit
            </button>
          </form>
          <div class="m-t-30 m-l-30">

          </div>
        </div>
        <ul class="sidebar-link w-full">

          <li class="p-b-13" style="background-color: #333 !important;width: 390px;margin-left: 0px;color: #fff;text-align: center;padding-top: 10px;height: 50px;margin-bottom: 10px;box-shadow: 1px 5px 20px 1px #333">

          </li>


        </ul>
      </div>
    <?php   }
    ?>
  </div>
</aside>
