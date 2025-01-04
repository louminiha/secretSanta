<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Santa - Dashboard</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">
                <h4><i class="fa-solid fa-sleigh"></i> Secret Santa</h4>
            </div>
            <p>General</p>
            <nav>
                <ul>
                    <li><a href="admin"><i class="fas fa-house"></i>Home</a></li>
                    <li><a href="deposits-validation"><i class="fas fa-chart-line"></i>Deposit</a></li>
                    <li><a href="#"><i class="fas fa-user-friends"></i>Users</a></li>
                    <li><a href="#"><i class="fas fa-gift"></i>Gifts</a></li>
                    </ul>
            </nav>
        </aside>
        <main class="main-content">
            <?php Flight::render($view); ?>
        </main>
    </div>
</body>
</html>