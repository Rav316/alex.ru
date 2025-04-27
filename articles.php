<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статьи</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .article {
            background: #fff;
            padding: 20px 25px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .article h2 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
            font-size: 24px;
        }
        .article p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }
        .article small {
            display: block;
            margin-top: 15px;
            color: #999;
            font-size: 13px;
            text-align: right;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 32px;
            color: #222;
        }
        .add-article {
            display: block;
            width: fit-content;
            margin: 20px auto 40px;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
        }
        .add-article:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Статьи</h1>
        <a class="add-article" href="pages/add_article.php">Добавить статью</a>
    </div>

    <?php
    $result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC;");
    while ($row = pg_fetch_assoc($result)) {
        echo "<div class='article'>
                <h2>" . htmlspecialchars($row['title']) . "</h2>
                <p>" . nl2br(htmlspecialchars($row['content'])) . "</p>
                <small>" . htmlspecialchars($row['created_at']) . "</small>
              </div>";
    }
    ?>
</div>

</body>
</html>

