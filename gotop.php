<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go to Top Button</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Your page content goes here -->

    <button id="goToTopBtn" title="Go to top"><i class="fa-solid fa-arrow-up"></i></button>
    <style>
        /* styles.css */

/* styles.css */

#goToTopBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button 20px from the bottom */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: #f35525; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 50%; /* Make it circular */
    width: 60px; /* Set a fixed width */
    height: 60px; /* Set a fixed height */
    text-align: center; /* Center text horizontally */
    line-height: 30px; /* Center text vertically */
    font-size: 24px; /* Increase font size */
}



#goToTopBtn:hover {
    background-color: #fdc7b7; /* Add a dark-grey background on hover */
    color:#f35525;
}


    </style>
    <script>
        // script.js

// Get the button
let mybutton = document.getElementById("goToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
mybutton.onclick = function() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
        
    </script>
</body>
</html>
