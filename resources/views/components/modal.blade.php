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