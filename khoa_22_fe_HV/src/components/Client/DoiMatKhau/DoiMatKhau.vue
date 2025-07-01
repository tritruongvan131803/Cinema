<template>
  <body>
  <div class="card p-4">
    <div class="text-center mb-3">
      <div class="fs-1 text-primary">🔒</div>
      <h4 class="fw-bold">Change Password</h4>
      <p class="text-muted mb-0">Please enter your current password and choose a new one</p>
    </div>

    <form>
      <div class="mb-3">
        <label class="form-label">Current Password</label>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Enter current password" />
          <span class="input-group-text password-toggle">👁️</span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">New Password</label>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Enter new password" />
          <span class="input-group-text password-toggle">👁️</span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm New Password</label>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Confirm new password" />
          <span class="input-group-text password-toggle">👁️</span>
        </div>
      </div>

      <ul class="requirements mt-3">
        <strong>Password requirements:</strong>
        <li>At least 8 characters</li>
        <li>One uppercase letter</li>
        <li>One lowercase letter</li>
        <li>One number</li>
        <li>One special character</li>
      </ul>

      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary">Change Password</button>
      </div>
    </form>
  </div>
</body>
</template>
<script>
export default {
    
}
</script>
<style>
    body {
      background-color: #f4f6fc;
    }
    .card {
      max-width: 480px;
      margin: 50px auto;
      border-radius: 16px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
    .password-toggle {
      cursor: pointer;
    }
    ul.requirements {
      font-size: 0.9rem;
      color: #555;
    }
</style>