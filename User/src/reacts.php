<?php
    include __DIR__ . '/../../src/db.php';

    // 1. Make sure a Post ID was actually sent
    if (isset($_POST['id'])) {
        $post_id = (int)$_POST['id'];

        // 2. Tell the database to add 1 to the current count for this specific ID
        $stmt = $conn->prepare('UPDATE posts SET reacts = reacts + 1 WHERE id = ?');
        $stmt->bind_param('i', $post_id);

        // 3. Execute the update
        $stmt->execute();
    }

    // 4. Send the user straight back to the dashboard to see the updated count
    header("Location: ../student/dashboard.php");
    exit();
?>
