<?php include 'header.php'; ?>

<h1>String Input Form</h1>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <p class="success">Message saved successfully!</p>
<?php endif; ?>

<form action="process.php" method="post">
    <label for="message">Enter your message (max 50 chars):</label><br>
    <input type="text" id="message" name="message" maxlength="50" required><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="showAll.php">Show all records</a>

<?php include 'footer.php'; ?>