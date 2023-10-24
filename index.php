<?php
session_start();
require_once('db.php');

$loggedIn = (isset($_SESSION['user_id'])) ? true : false;

if (isset($_SESSION['totalQuantity'])) {
  $totalQuantity = $_SESSION['totalQuantity'];
} else {
  $totalQuantity = 0;
}

$query = "SELECT * FROM menu";
$result = $db->query($query);

if ($loggedIn) {
  $user_id = $_SESSION['user_id'];
  $query = "SELECT role FROM users WHERE user_id = :user_id";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':user_id', $user_id);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row) {
    $role = $row['role'];
    if ($role === 'admin') {
      header('Location: admin.php');
      exit;
    } elseif ($role === 'customer') {
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Delizio </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/menu.css" rel="stylesheet" />
  <link href="css/footer.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <!-- header section starts.......... -->
  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Feane Logo">
          </a>
          <button id="navbar-toggler" class="navbar-toggler" aria-expanded="false" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#menu_section">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="handleCartClick();">
                  <i class="fas fa-shopping-cart"></i>
                  <span class="cart-quantity" id="cart-quantity">
                    <?php echo $totalQuantity; ?>
                  </span>
                </a>
              </li>
              <li class="user_option">
                <?php
                if ($loggedIn) {
                  echo '<a href="logout.php" class="user_link">';
                  echo '<i class="fa fa-sign-in" aria-hidden="true"></i>';
                  echo '</a>';
                } else {
                  echo '<a href="login.php" class="user_link">';
                  echo '<i class="fa fa-user" aria-hidden="true"></i>';
                  echo '</a>';
                }
                ?>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- MODAL UNTUK PERINGATAN CART WAJIB LOGIN-->
      <div id="myModal" class="modal">
        <div class="modal-content">
          <p>Oops, you'll need to log in first to get to this.</p>
          <button id="login-button" class="login-button">Login</button>
          <span class="close" onclick="closeModal()">Close</span>
        </div>
      </div>
    </header>
    <!-- end header section -->

    <!-- hero section -->
    <section class="slider_section">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-lg-6">
            <div class="detail-box">
              <h1>
                Italian Restaurant
              </h1>
              <p>
                Hello, <?php echo $loggedIn ? $_SESSION['username'] : 'Guest'; ?>! Welcome to Restoran <b>IF330 - Delizio.</b </p>
              <p>
                At Delizio, we take pride in serving you the finest Italian cuisine. Our menu is a reflection of our passion for authentic flavors and quality ingredients. Each dish is carefully crafted to tantalize your taste buds and transport you to the heart of Italy with every bite.
              </p>
              <p>
                Thank you for choosing Delizio. Sit back, relax, and enjoy the flavors of Italy. Buon appetito!
              </p>
              <div class="btn-box">
                <div class="btn-box">
                  <a href="#menu_section" class="btn1">
                    Take a Look
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  <!-- end hero section -->

  <!-- menu section -->
  <div class="menu_section item" id="menu_section" style="background-color: #fff;" data-aos="fade-up" data-aos-offset="300">
    <section class="food_section layout_padding-bottom">
      <div class="container">
        <div class="heading_container heading_center">
          <h2 style="color: #000; margin-bottom: 35px;">Our Menu</h2>
        </div>
        <div class="menu-categories">
          <button class="filter-button" data-category="all">All</button>
          <button class="filter-button" data-category="Pasta">Pasta</button>
          <button class="filter-button" data-category="Pizza">Pizza</button>
          <button class="filter-button" data-category="Soup">Soup</button>
          <button class="filter-button" data-category="Vegetables">Vegetables</button>
          <button class="filter-button" data-category="Appetizer">Appetizer</button>
          <button class="filter-button" data-category="Dessert">Dessert</button>
          <button class="filter-button" data-category="Drinks">Drinks</button>
        </div>
        <div class="menu-container">
          <?php
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <div class="card" data-category="<?= $row['kategori']; ?>" data-aos="fade-up" data-aos-offset="100">
              <div class="temporary_text">
                <img src="menupic/<?= $row['gambar_menu']; ?>" alt="<?= $row['nama_menu']; ?>" width="100" height="100">
              </div>
              <div class="card_content">
                <span class="card_title" style="color: #fff;"><?= $row['nama_menu']; ?></span>
                <span class="card_subtitle" style="color: #fff;">Rp. <?= $row['harga_menu']; ?></span>
                <p class="card_description" style="color: #fff;"><?= $row['deskripsi_menu']; ?></p>
                <form method="post" action="add_to_cart.php">
                  <input type="hidden" name="menu_id" value="<?= $row['id']; ?>">
                  <input type="hidden" name="menu_name" value="<?= $row['nama_menu']; ?>">
                  <input type="hidden" name="menu_price" value="<?= $row['harga_menu']; ?>">
                  <div class="quantity-and-button">
                    <form method="post" action="add_to_cart.php">
                      <input type="hidden" name="menu_id" value="<?= $row['id']; ?>">
                      <input type="hidden" name="menu_name" value="<?= $row['nama_menu']; ?>">
                      <input type="hidden" name="menu_price" value="<?= $row['harga_menu']; ?>">
                      <div class="quantity-and-button">
                        <button type="submit" class="add-to-cart-btn" name="add_to_cart" value="1" onclick="handleAddToCartClick();">
                          <i class="fas fa-shopping-cart"></i>Add to Cart
                        </button>
                        <input type="number" class="quantity-input" name="quantity" value="1">
                      </div>
                    </form>
                  </div>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="prev-next-buttons">
          <button id="prevButton" class="arrow-button">
            <i class="fas fa-chevron-left"></i> Prev
          </button>
          <button id="nextButton" class="arrow-button">
            Next <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </section>
  </div>
  <!-- end menu section -->

  <!-- FOOTER SECTION -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h6>About Delizio</h6>
          <p class="text-justify">Welcome to Delizio, your premier destination for authentic Italian cuisine. At Delizio, we are passionate about serving the finest Italian dishes that will transport your taste buds to the heart of Italy. Our menu includes a wide range of pasta, pizza, seafood, and delectable desserts, all made with the freshest ingredients and crafted by our skilled chefs.</p>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
            <a href="#">Delizio</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
            <li><a class="instagram" href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- end footer section -->
  <script>
    /* navbar toggler */
    document.addEventListener("DOMContentLoaded", function() {
      var navbarToggler = document.getElementById('navbar-toggler');
      if (navbarToggler) {
        navbarToggler.addEventListener('click', function() {
          var detailBox = document.querySelector('.slider_section .detail-box');
          if (detailBox.style.marginTop === '200px') {
            detailBox.style.marginTop = '100px';
          } else {
            detailBox.style.marginTop = '200px';
          }
        });
      }
    });

    //navbar background ketika fixed
    function changeNavbarBackground() {
      const header = document.querySelector('.header_section');
      const scrollPosition = window.scrollY;
      if (scrollPosition > 0) {
        header.style.backgroundColor = 'rgba(224, 165, 64, 0.459)';
      } else {
        header.style.backgroundColor = 'rgba(255, 255, 255, 0)';
      }
    }

    window.addEventListener('load', changeNavbarBackground);
    window.addEventListener('scroll', changeNavbarBackground);

    document.addEventListener("DOMContentLoaded", function() {
      const filterButtons = document.querySelectorAll(".filter-button");
      const menuItems = document.querySelectorAll(".card");

      filterButtons.forEach((button) => {
        button.addEventListener("click", function() {
          const category = this.getAttribute("data-category");

          menuItems.forEach((item) => {
            const itemCategory = item.getAttribute("data-category");

            if (category === "all" || itemCategory === category) {
              item.style.display = "block";
            } else {
              item.style.display = "none";
            }
          });
        });
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      const addToCartForms = document.querySelectorAll(".add-to-cart-form");
      addToCartForms.forEach(function(form) {
        form.addEventListener("submit", function(event) {
          event.preventDefault();
        });
      });
    });

    //modal
    function showModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "block";
    }

    function closeModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "none";
    }

    function showLoginRegisterModal() {
      showModal();
    }

    document.getElementById("login-button").addEventListener("click", function() {
      // Mengarahkan pengguna ke halaman login.php
      window.location.href = "login.php";
    });

    // navbar cart notif jumlah quantity yg di cart
    function handleCartClick() {
      <?php
      if ($loggedIn) {
        echo 'window.location.href = "shopping_cart.php";';
      } else {
        echo 'showLoginRegisterModal();';
      }
      ?>
    }

    function handleAddToCartClick(button) {
      <?php
      if (!$loggedIn) {
        echo 'showLoginRegisterModal();';
        echo 'event.preventDefault();';
      } else {
        echo 'addToCart(button);';
      }
      ?>
    }

    function addToCart(button) {
      var formData = new FormData();
      formData.append('menu_id', menuId);
      formData.append('menu_name', menuName);
      formData.append('menu_price', menuPrice);

      fetch('add_to_cart.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          updateCartQuantity();
        })
        .catch(error => {
          console.error('Error:', error)
        });
    }

    function updateCartQuantity() {
      var cartQuantityElement = document.getElementById('cart-quantity');

      <?php if (isset($_SESSION['totalQuantity'])) : ?>
        cartQuantityElement.textContent = <?= $_SESSION['totalQuantity'] ?>;
      <?php else : ?>
        cartQuantityElement.textContent = '';
      <?php endif; ?>
    }

    document.addEventListener("DOMContentLoaded", function() {
      updateCartQuantity();
    });

    function updateCartNotification() {
      $.ajax({
        type: 'POST',
        url: 'shopping_cart.php',
        success: function(response) {
          updateCartQuantity();
        },
        error: function(xhr, status, error) {}
      });
    }


    /* scroll to menu */
    function scrollToMenu() {
      const menuSection = document.getElementById("menu_section");
      if (menuSection) {
        window.scrollTo({
          top: menuSection.offsetTop,
          behavior: 'smooth'
        });
      }
    }

    document.addEventListener("DOMContentLoaded", function() {
      const menuLink = document.querySelector(".nav-link[href='#menu_section']");
      if (menuLink) {
        menuLink.addEventListener("click", function(event) {
          event.preventDefault();
          scrollToMenu();
        });
      }
    });

    document.addEventListener("DOMContentLoaded", function() {
      const takeALookButton = document.querySelector(".btn1");

      if (takeALookButton) {
        takeALookButton.addEventListener("click", function(event) {
          event.preventDefault();
          scrollToMenu();
        });
      }
    });

    //prev-next button
    document.addEventListener("DOMContentLoaded", function() {
      const menuContainer = document.getElementById("menu-container");
      const menuItems = document.querySelectorAll(".card");
      const prevButton = document.getElementById("prevButton");
      const nextButton = document.getElementById("nextButton");

      const itemsPerPage = 8;
      let currentPage = 0;

      function showPage(page) {
        const startIndex = page * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        menuItems.forEach((item, index) => {
          if (index >= startIndex && index < endIndex) {
            item.style.display = "block";
          } else {
            item.style.display = "none";
          }
        });
      }

      showPage(currentPage);
      prevButton.addEventListener("click", function() {
        if (currentPage > 0) {
          currentPage--;
          showPage(currentPage);
        }
      });
      nextButton.addEventListener("click", function() {
        const totalPages = Math.ceil(menuItems.length / itemsPerPage);
        if (currentPage < totalPages - 1) {
          currentPage++;
          showPage(currentPage);
        }
      });
    });


    // Scroll to top
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    function toggleScrollUpButton() {
      const scrollUpButton = document.getElementById('scrollUpButton');
      if (scrollUpButton) {
        if (window.scrollY > 300) {
          scrollUpButton.style.display = 'block';
        } else {
          scrollUpButton.style.display = 'none';
        }
      }
    }
    window.addEventListener('scroll', toggleScrollUpButton);
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 500,
    });
  </script>
  <button id="scrollUpButton" onclick="scrollToTop()">
    <i class="fas fa-arrow-up"></i>
  </button>
</body>

</html>