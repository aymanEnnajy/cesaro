

<!DOCTYPE html>
<html lang="en">

<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">

  
    <title>Admin | CESARO</title>
    <link rel="stylesheet" href="admin.css">
    
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation" id="menuDiv">
            <ul>
                <li>
                    <a href="#">
                        <div style="padding-left:12px;" >
                            <img style="width: 150px;" src="..\images\logo.png" >
                        </div>
                        
                       
                    </a>
                </li>

                <li>
                    <a href="index.php" id="btn1">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Acceuil</span>
                    </a>
                </li>

                <li>
                    <a href="client.php" id="btn2">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Client </span>
                    </a>
                </li>

                <li>
                    <a href="message_avis.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                 <li>
                    <a href="produit.php">
                        <span class="icon">
                        <ion-icon name="cube-outline"></ion-icon>

                        </span>
                        <span class="title">Produit</span>
                    </a>
                </li>

                

               <li>
                    <a href="changepassword.html" id="btn3" data-bs-target="#section3">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password & admine</span>
                    </a>
                </li>

               

                <li>
                    <form action="logout.php" method="post" style="margin: 0;">
                        <a href="#" onclick="document.getElementById('logoutSubmit').click(); return false;">
                            <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Se déconnecter</span>
                        </a>
                        <input type="submit" id="logoutSubmit" style="display: none;">
                    </form>
                </li>
                
                <style>
                    #lii{
                        
                      width: 100%;
                      height: 45px;
                    }
                    #lii:hover{
                        background-color: #f35525;
                    }
                    
                    .tit{
                        margin-left: 17px;
                        display: flex;
                        width: 100%;
                      height: 25px;
                    }
                    #subi{
                        background: none;
                        cursor: pointer;
                        margin-left: 19px;
                        color: white;
                        font-size: 18px;
                        border: none;

                    }
                   
                </style>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
          <style>
                    #lii{
                        
                      width: 100%;
                      height: 45px;
                    }
                    #lii:hover{
                        background-color: #f35525;
                    }
                    
                    .tit{
                        margin-left: 17px;
                        display: flex;
                        width: 100%;
                      height: 25px;
                    }
                    #subi{
                        background: none;
                        cursor: pointer;
                        margin-left: 19px;
                        color: white;
                        font-size: 18px;
                        border: none;

                    }
                    
                   
                </style>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <section id="section1">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                

    <style>
        /* Add some basic styling for the search pop-up */
        .search-popup {
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            width: 100%;
            z-index: 1000;
            display: none; /* Initially hidden */
        }
        .search-popup div {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .search-popup div:hover {
            background-color: #f0f0f0;
        }
        .highlight {
            background-color: yellow;
        }
    </style>

    <div class="search" style="position: relative;">
        <label>
            <input type="text" id="searchInput" placeholder="Search here">
            <button onclick="performSearch()"><ion-icon name="search-outline"></ion-icon></button>
        </label>
        <div id="searchResults" class="search-popup"></div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', showSuggestions);
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        function highlightText(text, query) {
            const index = text.toLowerCase().indexOf(query.toLowerCase());
            if (index === -1) return text;
            return text.substring(0, index) + '<span class="highlight">' + text.substring(index, index + query.length) + '</span>' + text.substring(index + query.length);
        }

        function showSuggestions() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = ''; // Clear previous results

            if (query === '') {
                resultsContainer.style.display = 'none';
                return;
            }

            // List of pages to search
            const pages = ['produit.php', 'client.php', 'index.php','message_avis.php']; // Add all the pages you want to search

            // Fetch content from each page and search for the query
            pages.forEach(page => {
                fetch(page)
                    .then(response => response.text())
                    .then(data => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');
                        const textContent = doc.body.textContent.toLowerCase();
                        const queryIndex = textContent.indexOf(query);

                        if (queryIndex !== -1) {
                            // Find a snippet of text around the query
                            const snippetLength = 100;
                            const start = Math.max(0, queryIndex - snippetLength / 2);
                            const end = Math.min(textContent.length, queryIndex + snippetLength / 2);
                            let snippet = doc.body.textContent.substring(start, end);

                            // Highlight the query within the snippet
                            snippet = highlightText(snippet, query);

                            const result = document.createElement('div');
                                                        result.innerHTML = `<a style="text-decoration:none; color:#f35525" href="${page}" target="_blank">${snippet}...</a>`;

                            resultsContainer.appendChild(result);
                        }
                    })
                    .catch(error => console.error('Error fetching page:', page, error));
            });

            resultsContainer.style.display = 'block'; // Show the suggestions
        }

        function performSearch() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = ''; // Clear previous results

            if (query === '') {
                alert('Please enter a search query.');
                return;
            }

            // List of pages to search
            const pages = ['produit.php', 'client.php', 'index.php','message_avis.php']; // Add all the pages you want to search

            // Fetch content from each page and search for the query
            pages.forEach(page => {
                fetch(page)
                    .then(response => response.text())
                    .then(data => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');
                        const textContent = doc.body.textContent.toLowerCase();
                        const queryIndex = textContent.indexOf(query);

                        if (queryIndex !== -1) {
                            // Find a snippet of text around the query
                            const snippetLength = 100;
                            const start = Math.max(0, queryIndex - snippetLength / 2);
                            const end = Math.min(textContent.length, queryIndex + snippetLength / 2);
                            let snippet = doc.body.textContent.substring(start, end);

                            // Highlight the query within the snippet
                            snippet = highlightText(snippet, query);

                            const result = document.createElement('div');
                                                        result.innerHTML = `<a style="text-decoration:none; color:#f35525" href="${page}" target="_blank">${snippet}...</a>`;

                            resultsContainer.appendChild(result);
                        }
                    })
                    .catch(error => console.error('Error fetching page:', page, error));
            });

            resultsContainer.style.display = 'block'; // Show the suggestions
        }
    </script>

                <div class="user">
                    <img src="../images/ZHA.png" alt="">
                </div>
            </div>
            <div id="container_avis">
        <h1>Nos client</h1>
    </div>
    <div id="container_avis">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>ID Utilisateur</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Date de commande</th>
                    <th>Montant (DH)</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'phpcostumer.php'; ?>
            </tbody>
        </table>
    </div>

 
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
   

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>








