<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <form action="./formHandling.php" method="POST">
    <h2>Contact Us</h2>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter your name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" placeholder="Write your message" required></textarea>
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="">--Select--</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>
    <button type="submit">Submit</button>
  </form>
</body>
</html>
