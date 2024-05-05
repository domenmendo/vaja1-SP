<div class="container">
    <h3 class="mb-3">Change Password</h3>
    <form action="/users/changePassword" method="POST">
        <div class="mb-3">
            <label for="current_password" class="form-label" required autocomplete="new">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required autocomplete="new">
            <?php if (isset($_GET['error']) && $_GET['error'] == 2): ?>
                <div class="text-danger">Wrong password</div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="change_password">Change Password</button>
    </form>
</div>