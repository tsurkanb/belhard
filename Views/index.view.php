<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../core/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../core/bootstrap/css/style.css">
</head>
<body>
<div class="well">
    <h1>Задачи</h1>
    <form action="" method="post">
        <input type="text" name="title" placeholder="Только текст" required> <br>
        <input type="submit" value="Создать таск" class="btn">
    </form>

    <ol>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php
                if ($task->complete == 1):
                    echo '<s class="text-muted">' . $task->title . '</s>'; ?>

                    <a href="?del=<?= $task->id ?>" class="btn btn-danger">Удалить</a>
                    <?php
                else:
                    echo '<p class="text-success">' . $task->title ?> <!-- Закрываем php для отобр ссылки -->

                    <a href="?done=<?= $task->id ?>" class="btn btn-success">Done</a>
                <?php endif; ?>


            </li>
        <?php endforeach; ?>
    </ol>
</div>
<script src="../core/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>