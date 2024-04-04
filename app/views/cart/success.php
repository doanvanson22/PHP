<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <!-- Include Lottie library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.3/lottie.min.js"></script>
    <style>
    /* Style for the success animation */
    #successAnimation {
        width: 200px;
        height: 200px;
    }

    /* Style for the back button */
    #backButton {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div id="successAnimation"></div>
    <button id="backButton" onclick="goBack()">Back to Home</button>

    <script>
    // Function to go back to home page
    function goBack() {
        window.location.href = 'index.php'; // Change 'index.php' to your home page URL
    }

    // Load Lottie animation
    var animation = bodymovin.loadAnimation({
        container: document.getElementById('successAnimation'),
        renderer: 'svg',
        loop: false,
        autoplay: true,
        path: 'buoi4php/app/assets/success.json', // Path to your Lottie JSON file
        xhrSettings: {
            responseType: 'text' // Set responseType to 'text'
        }
    });
    </script>
</body>

</html>