<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peculiar Shopahlc</title>
    <link rel="stylesheet" href="/css/variables.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <?php require_once VIEWS."/layouts/partials/site/nav.php"?>
    <?php require_once VIEWS."/layouts/partials/site/aside.php"?>
    <div class="container">
    {{content}}
    </div>
    <?php require_once VIEWS."/layouts/partials/site/footer.php"?>
    <script src="/js/app.js"></script>
</body>

</html>
