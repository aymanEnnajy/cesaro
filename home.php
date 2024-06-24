<!DOCTYPE html>
<html lang="en">
<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
<header class="header">
<div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> info@company.com</li>
            <li><i class="fa fa-map"></i> imm. Chkili, Bd Abdelkrim Al Khattabi, Marrakech </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="https://web.facebook.com/cesarosarl/?_rdc=1&_rdr"><i class="fab fa-facebook"></i></a></li>
           
            <li><a href="https://wa.me/+212676170551?text=Hello%2C%20this%20is%20a%20pre-filled%20message" class="whatsapp-icon" onclick="sendMessage()"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="https://www.instagram.com/cesaromaroc"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav class="nav-bar">
    <a href="index.php"><img class="logo-im" src="images/logo.png" alt="Logo"></a>
    <div id="search-container">
      <i class="fas fa-search search-icon" id="search-icon"></i>
      <form class="recherche" action="search.php" method="get" id="search-form" style="margin-top: -20px;">
        <input type="search" name="search" id="inpSearch" placeholder="chercher un produit" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="submit" name="btnRechercher" id="btnSearch" value="Rechercher">
        <button type="button"  id="close-search"><i class="fas fa-times"></i></button>
      </form>
    </div>
    <div class="navbar" id="nav-but">
      <div class="nav-font">
        <input type="checkbox" id="check">
        <span class="menu">
          <?php
            session_start();
            $conn = new mysqli("localhost", "root", "", "projet_finetude");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $somme_prix = 0;
            $id_utilisateur = isset($_SESSION['ID_UTIL']) ? $_SESSION['ID_UTIL'] : null;
            if ($id_utilisateur) {
                $query = $conn->prepare("SELECT SUM(pdtmontantTotal_adcart) AS total FROM panier WHERE ID_UTIL = ?");
                $query->bind_param("i", $id_utilisateur);
                $query->execute();
                $query->bind_result($somme_prix);
                $query->fetch();
                $query->close();
            }
          ?>
          <ul id="nov_bar">
            <li><a id="nav-b" href="index.php">Accueil</a></li>
            <li><a id="nav-b" href="about.php">À propos</a></li>
            <li>
              <a id="nav-b" href="#">Service</a>
              <ul class="dropdown">
                <li><a href="produit_carrelage.php">Carrelage</a></li>
                <li><a href="produit.php">Robinetterie</a></li>
              </ul>
            </li>
            <li><a id="nav-b" href="contact.php">Contact</a></li>
            <div class="profile" style="color:white;">
              <span id="cart-total-price"><a style="color:white" href="panier/cart.php"><?php echo $somme_prix; ?></a></span> DH
              <a href="panier/cart.php">
                <i id="profil-icon" class="fa fa-shopping-cart"></i>
              </a>
            </div>
            <?php if (isset($_SESSION['loggedIn'])): ?>
              <div id="logoutLink" class="profile" style="margin-left:-1px; margin-right:12px;">
                <li><i class="fa fa-sign-out" aria-hidden="true" style="color: white; font-size:15px;"></i><a href="logout.php">Logout</a></li>
              </div>
              <div id="welcome" style="color:white; text-decoration: underline; font-size:11px;">Bienvenue, <?php echo $_SESSION['name']; ?></div>
            <?php else: ?>
              <div id="nov_bar">
                <div id="loginLink" class="profile">
                  <a href="chooselogin.html">
                    <i id="profil-icon" class="fas fa-user-alt"></i>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </ul>
        </span>
        <label for="check" class="close_menu"><i class="fas fa-times"></i></label>
        <label for="check" class="open_menu"><i class="fas fa-bars" id="FA"></i></label>
      </div>
    </div>
  </nav>
</header>
<script src="script.js"></script>
<style>
  body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.header {
    background-color: black;
    color: #fff;
    padding: 0px 0;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.nav-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
}



#search-container {
    position: relative;
}

.search-icon {
    cursor: pointer;
    font-size: 20px;
    color: #fff;
}

#search-form {
    display: none;
    position: absolute;
    top: 0;
    left: -150px;
    transform: translateX(-50%);
}
@media (min-width:975px)and (max-width:2975px) {
    .dropdown, .dropdown-center, .dropend, .dropstart, .dropup, .dropup-center {
        position:absolute;
    }
}

#inpSearch {
    width: 300px;
    height: 40px;
    border-radius: 15px;
    text-align: center;
    border: none;
    padding: 0 10px;
}

#close-search {
    display: none;
    border: none;
    background: none;
    cursor: pointer;
    font-size: 20px;
    color: #fff;
    margin-left: 10px;
}

#nav-but {
    display: flex;
    align-items: center;
}

.nav-font {
    display: flex;
    align-items: center;
}

#nov_bar {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
}

#nov_bar li {
    padding: 0 10px;
}

#nav-b {
    color: #fff;
    text-decoration: none;
}

.profile {
    display: flex;
    align-items: center;
    color: white;
   
}

.profile i {
    font-size: 20px;
    margin-left: 10px;
}

.dropdown {
    display: none;
}


.close_menu, .open_menu {
    display: none;
}

@media (max-width: 970px) {

    .nav-font {
        flex-direction: column;
    }

    .open_menu {
        display: block;
        cursor: pointer;
        font-size: 20px;
        color: #fff;
    }

    .close_menu {
        display: none;
        cursor: pointer;
        font-size: 20px;
        color: #fff;
    }

    #check:checked ~ .menu .open_menu {
        display: none;
    }

    #check:checked ~ .menu .close_menu {
        display: block;
    }

    #nov_bar {
        flex-direction: column;
        display: none;
    }

    #check:checked ~ .menu #nov_bar {
        display: flex;
    }

    #inpSearch {
        width: 100%;
    }

    #search-form {
        position: static;
        transform: none;
    }

    #close-search {
        display: block;
    }
}

</style>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.getElementById('check');
    const openMenuIcon = document.querySelector('.open_menu');
    const closeMenuIcon = document.querySelector('.close_menu');
    const searchIcon = document.getElementById('search-icon');
    const searchForm = document.getElementById('search-form');
    const navBar = document.getElementById('nov_bar');
    const closeSearch = document.getElementById('close-search');
    const inpSearch = document.getElementById('inpSearch');

    function showSearchIcon() {
        searchIcon.style.display = searchForm.style.display === 'none' ? 'block' : 'none';
    }

    menuButton.addEventListener('change', () => {
        if (menuButton.checked) {
            openMenuIcon.style.display = 'none';
            closeMenuIcon.style.display = 'block';
            searchForm.style.display = 'none';
            navBar.style.display = 'flex';
            showSearchIcon();
        } else {
            openMenuIcon.style.display = 'block';
            closeMenuIcon.style.display = 'none';
            searchForm.style.display = 'none';
            navBar.style.display = 'none';
            showSearchIcon();
        }
    });

    searchIcon.addEventListener('click', (e) => {
        e.stopPropagation();
        searchForm.style.display = searchForm.style.display === 'none' ? 'flex' : 'none';
        navBar.style.display = 'none';
        showSearchIcon();
    });

    closeSearch.addEventListener('click', (e) => {
        e.stopPropagation();
        searchForm.style.display = 'none';
        navBar.style.display = 'flex';
        showSearchIcon();
    });

    document.addEventListener('click', (e) => {
        if (!searchForm.contains(e.target) && e.target !== searchIcon) {
            searchForm.style.display = 'none';
            navBar.style.display = 'flex';
            showSearchIcon();
        }
    });

    // Reset navbar on resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 970) {
            menuButton.checked = false;
            openMenuIcon.style.display = 'none';
            closeMenuIcon.style.display = 'none';
            navBar.style.display = 'flex';
            searchForm.style.display = 'none';
            showSearchIcon();
        } else {
            openMenuIcon.style.display = 'block';
            navBar.style.display = 'none';
            showSearchIcon();
        }
    });

    // Initial check on page load
    if (window.innerWidth > 970) {
        openMenuIcon.style.display = 'none';
        closeMenuIcon.style.display = 'none';
        navBar.style.display = 'flex';
        searchForm.style.display = 'none';
        searchIcon.style.display = 'block';
    } else {
        openMenuIcon.style.display = 'block';
        navBar.style.display = 'none';
        searchIcon.style.display = 'block';
    }
});

</script>
</body>
</html>
