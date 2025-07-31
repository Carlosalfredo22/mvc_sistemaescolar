<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
    <h1>Edit Teacher</h1>
    <form method="post" action="index.php?action=updateTeacher&id=<?php echo $teacher['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($teacher['username']); ?>" required>

        <label for="password">password:</label>
        <input type="password" name="password" id="password" placeholder="Leave blank to keep current password">

        <button type="submit">Update</button>
    </form>
    <a href="index.php?action=adminDashboard">Back to Dashboard</a>
</body>
</html>
