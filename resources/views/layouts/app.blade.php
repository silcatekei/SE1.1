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
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/modal.css') }}">
    <style>
        body {
           background-image: url('{{ asset('assets/SPI_LOGO-removebg-preview.png') }}');
           background-size: contain;
           background-repeat: no-repeat;
           background-attachment: fixed;
           background-position: center center;
        }
        /* The switch - the box around the slider */
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3; /* Or a dark color that fits your dark mode */
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }

        /* Add the moon icon */
        .slider.round:after {
            position: absolute;
            content: "";
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px; /* Adjust size as needed */
            height: 20px; /* Adjust size as needed */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M12.74,3.75c0.8,0,1.55,0.32,2.12,0.88c-2.79,0.84-4.84,3.29-4.84,6.28c0,2.99,2.05,5.44,4.84,6.28c-0.57,0.57-1.32,0.88-2.12,0.88c-3.59,0-6.5,-2.91-6.5-6.5C6.24,6.66,9.15,3.75,12.74,3.75z"/></svg>');
            background-repeat: no-repeat;
            background-size: contain;
        }

        input:checked + .slider.round:after {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="yellow"><path d="M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4Z" /></svg>');
        }


        /* Dark Mode Specific Styles */
        body.dark-mode {
            background-color: #333;
            color: #fff;
           background-image: none;  /*Remove background Image */
        }

        .dark-mode .modal-content {
            background-color: #555;
            color: #fff;
        }
        .dark-mode body{
             background-color: #000;  /*Black Background*/
        }

        .dark-mode .slider {
            background-color: #666;  /* A darker slider color */
        }

    </style>
</head>

<body>
    @yield('content')
   <!-- Student Portal Modal -->
   <!-- Code for the student portal -->
   <div id="studentPortalModal" class="modal">
    <div class="modal-content">
        <span class="close-button" id="closeModal">×</span>
        <h2>Student Portal Login</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="studentId">Student ID:</label>
                <input type="text" class="form-control" id="studentId" placeholder="Enter Student ID">
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p id="loginMessage" style="color: red; margin-top: 10px; display: none;">Invalid Student ID or
            Password.</p>
    </div>
</div>
  <!-- Enrollment Form Modal (Moved to app.blade.php) -->
    <div id="enrollmentFormModal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="closeEnrollmentForm">×</span>
            <h2>Enrollment Form</h2>
            <form id="enrollmentForm">
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <!-- Add more form fields (address, phone, etc.) -->
                <div class="form-group">
                    <label for="strand">Strand:</label>
                    <select class="form-control" id="strand" name="strand">
                        <option value="">Select Strand</option>
                        <option value="ABM">ABM (Accountancy, Business and Management)</option>
                        <option value="ICT">ICT (Information and Communications Technology)</option>
                        <option value="HRM">HRM (Hotel and Restaurant Management)</option>
                        <option value="GAS">GAS (General Academic Strand)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Contacts:</label>
                    <input type="email" class="form-control" id="number" placeholder="Enter your number" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Application</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>