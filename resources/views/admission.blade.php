<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Default Light Mode Styles */
        body {
            /*Use the school logo as a background*/
            background-image: url('{{ asset('SPI_LOGO-removebg-preview.png') }}');
            /* REPLACE WITH YOUR LOGO PATH */
            background-size: contain;
            /* Change from cover to contain */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            font-family: sans-serif;
            min-height: 100vh;
            margin: 0;
            color: #333;
            /* Default text color */
        }

        /* Adjust background color to accommodate the background image */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.3);
            /* Adjust transparency as needed */
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            z-index: -1;
        }


        /* General Mica Styling */
        .mica-background {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Hero Section */
        .hero {
            /* Reduced hero section styling to make room for the slider */
            color: white;
            padding: 40px 0 60px;
            /* Reduced top padding, more bottom padding */
            text-align: center;
            position: relative;
            overflow: hidden;
            /* Remove background image and gradient */
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: 0;
        }

        .hero>* {
            position: relative;
            z-index: 1;
        }

        .hero h1,
        .hero p {
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* Features Section */
        .features {
            padding: 50px 0;
        }

        .feature-box {
            text-align: center;
            border: none;
        }

        .feature-box i {
            font-size: 48px;
            color: #28a745;
        }

        /* Footer */
        .footer {
            background-color: rgba(52, 58, 64, 0.8);
            color: white;
            padding: 20px 0;
            text-align: center;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        /* Navigation Bar */
        .navbar {
            background-color: rgba(40, 167, 69, 0.2) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: white !important; /* Default to white for dark mode */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* Navbar text black in light mode */
        body:not(.dark-mode) .navbar-brand,
        body:not(.dark-mode) .nav-link {
          color: #000 !important;
          text-shadow: none; /* Remove text-shadow in light mode */
        }

        .navbar-brand img {
            margin-right: 10px;
            height: 40px;
        }

        .nav-link {
            color: white !important; /* Default to white for dark mode */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        /* Admission and Contact Sections */
        #admission,
        #contact {
            background-color: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
            border-radius: 10px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Form styling */
        .form-control {
            background-color: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.8);
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        /*Button Styling*/
        .btn-primary,
        .btn-success {
            background-color: rgba(40, 167, 69, 0.8);
            border-color: rgba(40, 167, 69, 0.9);
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover,
        .btn-success:hover {
            background-color: rgba(40, 167, 69, 1);
            border-color: rgba(40, 167, 69, 1);
            transform: scale(1.05); /* Slightly enlarge the button */
            transition: transform 0.2s ease-in-out; /* Smooth transition */
        }

        /* Minimal Dark Mode Styles */
        body.dark-mode {
            background-color: #222;
            color: #eee;
        }

        body.dark-mode::before {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .dark-mode .mica-background {
            background-color: rgba(34, 34, 34, 0.6);
            /* Darker mica background */
            color: #eee;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.05);
            /* Subtle shadow */
        }

        .dark-mode #admission,
        #contact {
            background-color: rgba(34, 34, 34, 0.8);
            color: #eee;
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.05);
        }

        .dark-mode .form-control {
            background-color: #444;
            color: #eee;
            border: 1px solid #666;
        }

        .dark-mode .form-control:focus {
            background-color: #555;
            color: #eee;
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .dark-mode .navbar {
            background-color: rgba(40, 167, 69, 0.4) !important;
        }

        .dark-mode .footer {
            background-color: rgba(52, 58, 64, 1);
        }

        /* Student Portal Styles */
        #studentPortalModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 80%;
            max-width: 500px;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .dark-mode .modal-content {
            background-color: #333;
            color: #eee;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        .dark-mode .close-button {
            color: #eee;
        }

        /* Styles for the login form within the modal */
        #loginForm {
            margin-top: 20px;
        }

        #loginForm .form-group {
            margin-bottom: 15px;
        }


        /* Dark Mode Toggle Button (Bottom Right) */
        #darkModeToggleButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: rgba(40, 167, 69, 0.8);
            border-color: rgba(40, 167, 69, 0.9);
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            z-index: 999;
            display: flex; /* Use flexbox for icon and text */
            align-items: center; /* Vertically center items */
            justify-content: center; /* Horizontally center items */
            gap: 5px; /* Add some space between icon and text */
        }

        #darkModeToggleButton:hover {
            background-color: rgba(40, 167, 69, 1);
            border-color: rgba(40, 167, 69, 1);
        }

        /* Hide the original dark mode toggle in the navbar */
        #darkModeToggle {
            display: none;
        }

        /* Slider Styling */
        #imageSlider {
            width: 100%;
            overflow: hidden;
            position: relative;
            height: 400px;
            /* Set a fixed height for the slider */
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
            /* Make the slider-wrapper take full height of the slider */
        }

        .slide {
            min-width: 100%;
            /* Each slide takes full width */
            height: 100%;
            /* Make the slide take full height of the slider */
            background-size: contain;
            /* Contain the image within the slide */
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            display: flex;
            /* Use flexbox to center content */
            justify-content: center;
            /* Horizontally center */
            align-items: center;
            /* Vertically center */
        }

        /* Add overlay for text on the slider */
        .slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* No background overlay */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        /* Add overlay for text on the slider */
        .slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Remove background overlay */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 20px;
            background: none;
            /* Remove background color */
            text-shadow: 2px 2px 4px #000000;
            /* Add a text shadow for better readability */
        }

        .slide-overlay h2 {
            font-size: 2.5em;
            margin-bottom: 10px;
            display: none;
            /* Hide the title */
        }

        .slide-overlay p {
            font-size: 1.2em;
            display: none;
            /* Hide the description */
        }


        /* Navigation dots */
        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .slider-nav a {
            display: block;
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            margin: 0 5px;
            text-indent: -9999px;
            /* Hide the link text */
            overflow: hidden;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .slider-nav a.active {
            background-color: white;
        }

        /* Style for the apply now button */
        .apply-now-container {
          margin-top: 30px;
          text-align: center; /* Center the button */
        }

        .apply-now-button {
            display: inline-block;
            padding: 15px 40px; /* Make it bigger */
            font-size: 1.5em; /* Increase font size */
            font-weight: bold;
            background-color: rgba(40, 167, 69, 0.9); /* Slightly more opaque */
            border-color: rgba(40, 167, 69, 1);
            color: white !important; /* Ensure text is always white */
            border-radius: 8px; /* More rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Stronger shadow */
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Smooth transitions */
            text-decoration: none; /* Remove underline from link */
        }

        .apply-now-button:hover {
            background-color: rgba(40, 167, 69, 1);
            transform: scale(1.1); /* Even more noticeable enlargement */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4); /* Stronger shadow on hover */
        }

        /* Make sure the button is visible in dark mode */
        body.dark-mode .apply-now-button {
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1); /* Adjusted shadow for dark mode */
        }

        body.dark-mode .apply-now-button:hover {
            box-shadow: 0 6px 8px rgba(255, 255, 255, 0.2); /* Adjusted hover shadow for dark mode */
        }

         /* Dark Mode Navbar Text Color (override light mode) */
        body.dark-mode .navbar-brand,
        body.dark-mode .nav-link {
          color: white !important;  /* White text in dark mode */
          text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Keep the shadow */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        /* Switch Styling */
        .theme-switch-wrapper {
            display: flex;
            align-items: center;
        }

        .theme-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .theme-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #28a745; /* Green */
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('SPI_LOGO-removebg-preview.png') }}" alt="School Logo">
                SKILL-POWER INSTITUTE SHS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#admission">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="studentPortalLink">Student Portal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">

        <!-- Image Slider -->
        <div id="imageSlider">
            <div class="slider-wrapper">
                <div class="slide" style="background-image: url('{{ asset('enrollment.jpg') }}');">
                    <div class="slide-overlay">
                        <h2>Welcome to SPI SHS</h2>
                        <p>Providing Quality Education for a Brighter Future.</p>
                    </div>
                </div>
                <div class="slide" style="background-image: url('{{ asset('enrollment1.jpg') }}');">
                    <div class="slide-overlay">
                        <h2>Dedicated Faculty</h2>
                        <p>Learn from experienced and passionate teachers.</p>
                    </div>
                </div>
                <div class="slide" style="background-image: url('{{ asset('SPI.png') }}');">
                    <div class="slide-overlay">
                        <h2>Explore Career Pathways</h2>
                        <p>Prepare for your future career with specialized tracks.</p>
                    </div>
                </div>
            </div>
            <nav class="slider-nav">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
            </nav>
        </div>

        <!-- Apply Now Button -->
        <div class="apply-now-container">
          <a href="#admission" class="apply-now-button">Apply Now</a>
        </div>

    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box mica-background">
                        <i class="fas fa-book"></i>
                        <h3>Academic Excellence</h3>
                        <p>We offer a rigorous and comprehensive curriculum designed to prepare you for college and
                            beyond.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box mica-background">
                        <i class="fas fa-users"></i>
                        <h3>Dedicated Faculty</h3>
                        <p>Our experienced and passionate teachers are committed to your success.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box mica-background">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>Career Pathways</h3>
                        <p>Explore specialized tracks and develop skills for your future career.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Admission Section -->
    <section id="admission" class="container mt-5 mica-background">
        <h2>Admission Information</h2>
        <p>Ready to join our Senior High School? Here's what you need to know:</p>

        <h4>Eligibility Requirements:</h4>
        <ul>
            <li>Completed Grade 10 (Junior High School)</li>
            <li>Good academic standing</li>
            <li>Submission of required documents</li>
        </ul>

        <h4>Required Documents:</h4>
        <ul>
            <li>Application Form (Downloadable below)</li>
            <li>Report Card (Form 138)</li>
            <li>Birth Certificate (PSA)</li>
            <li>Good Moral Character Certificate</li>
        </ul>

        <p>For any questions or concerns, please contact the Admission Office.</p>

        <a href="#" class="btn btn-success">Apply Now</a>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="container mt-5 mica-background">
        <h2>Contact Us</h2>
        <p>Have questions? Get in touch with us!</p>

        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <h5>Our Address:</h5>
                <p>SPI Building, ML Quezon Avenue Extension, San Roque, Antipolo, Philippines</p>
                <h5>Phone:</h5>
                <p>0905 317 2869</p>
                <h5>Email:</h5>
                <p>mktg.skillpowerinstitute@gmail.com</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>© {{ date('Y') }} Senior High School. All rights reserved.</p>
        </div>
    </footer>

    <!-- Student Portal Modal -->
    <div id="studentPortalModal">
        <div class="modal-content">
            <span class="close-button" id="closeModal">×</span>
            <h2>Student Portal Login</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="studentId">Student ID:</label>
                    <input type="text" class="form-control" id="studentId" placeholder="Enter Student ID">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p id="loginMessage" style="color: red; margin-top: 10px; display: none;">Invalid Student ID or Password.</p>
        </div>
    </div>

    <!-- Dark Mode Toggle Button -->
    <div id="darkModeToggleButton">
       <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const darkModeToggleButton = document.getElementById('darkModeToggleButton');
        const darkModeIcon = document.getElementById('darkModeIcon');
        const body = document.body;
        const studentPortalLink = document.getElementById('studentPortalLink');
        const studentPortalModal = document.getElementById('studentPortalModal');
        const closeModal = document.getElementById('closeModal');
        const loginForm = document.getElementById('loginForm');
        const loginMessage = document.getElementById('loginMessage');
        const checkbox = document.getElementById('checkbox');


        // Function to toggle dark mode
        function toggleDarkMode() {
            body.classList.toggle('dark-mode');

            // Store the user's preference in localStorage
            localStorage.setItem('darkMode', body.classList.contains('dark-mode'));

           // Update Navbar Style - removed javascript styling instead use CSS classes
           updateNavbarStyle();

        }
          // Function to update Navbar Style - removed javascript styling instead use CSS classes
        function updateNavbarStyle() {
            const navbar = document.querySelector('.navbar');

            if (!body.classList.contains('dark-mode')) {
                // Light mode
                navbar.classList.remove('navbar-dark'); // Remove dark theme class
                navbar.classList.add('navbar-light'); // Add light theme class

            } else {
                // Dark mode
                navbar.classList.remove('navbar-light'); // Remove light theme class
                navbar.classList.add('navbar-dark'); // Add dark theme class

            }
        }

        // Check localStorage for user's dark mode preference on page load
        if (localStorage.getItem('darkMode') === 'true') {
            body.classList.add('dark-mode');
             checkbox.checked = true;
        }

        // Initial Navbar Style
          updateNavbarStyle();

        // Checkbox event listener
        checkbox.addEventListener('change', () => {
            toggleDarkMode();
        });

        // Add event listener to the dark mode toggle button
        darkModeToggleButton.addEventListener('click', toggleDarkMode);


        // Student Portal Modal Functionality
        studentPortalLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the link from navigating

            console.log('Student Portal link clicked!');  // Add this line

            // Show the modal
            studentPortalModal.style.display = 'block';
        });

        closeModal.addEventListener('click', function() {
             console.log('Close button clicked!');  // Add this line
            studentPortalModal.style.display = 'none';
            loginMessage.style.display = 'none'; // Hide the error message when closing the modal
        });

        // Close the modal if the user clicks outside of it
        window.addEventListener('click', function(event) {
            if (event.target == studentPortalModal) {
                studentPortalModal.style.display = 'none';
            }
        });

        // Handle the login form submission
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting in the default way

            const studentId = document.getElementById('studentId').value;
            const password = document.getElementById('password').value;

            // *** THIS IS WHERE YOU WOULD IMPLEMENT YOUR ACTUAL LOGIN LOGIC ***
            //  - Send an AJAX request to your server to authenticate the user.
            //  - The server would check the student ID and password against your database.
            //  - If the login is successful, the server would return a success response.
            //  - If the login fails, the server would return an error response.

            // For this example, we're using dummy credentials.
            if (studentId === 'STU12345' && password === 'PasswOrd123') {
                // Successful login
                alert('Login Successful!'); // Replace with redirecting to student portal page.
                studentPortalModal.style.display = 'none';  //Close the modal.
                loginMessage.style.display = 'none'; // Hide the error message

            } else {
                // Failed login
                loginMessage.style.display = 'block'; // Show the error message
            }
        });

        // JavaScript for slider
        const sliderWrapper = document.querySelector('.slider-wrapper');
        const slides = document.querySelectorAll('.slide');
        const sliderNavLinks = document.querySelectorAll('.slider-nav a');
        let slideIndex = 0;
        let intervalId;

        function moveSlide() {
            sliderWrapper.style.transform = `translateX(-${slideIndex * 100}%)`;
            updateNav();
        }

        function updateNav() {
            sliderNavLinks.forEach((link, index) => {
                if (index === slideIndex) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        function goToSlide(index) {
            slideIndex = index;
            moveSlide();
            resetInterval();
        }

        function startSlider() {
            intervalId = setInterval(() => {
                slideIndex = (slideIndex + 1) % slides.length;
                moveSlide();
            }, 5000); // Change slide every 5 seconds
        }

        function resetInterval() {
            clearInterval(intervalId);
            startSlider();
        }

        sliderNavLinks.forEach((link, index) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                goToSlide(index);
            });
        });

        startSlider(); // Initialize the slider
        updateNav();
    </script>
</body>

</html>