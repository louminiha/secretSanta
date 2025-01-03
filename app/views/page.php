<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Christmas Themed Website</title>
</head>
<body>
    <div id="login">
        <div class="register">
            <h1>Welcome!</h1>
            <div class="prom">
                <p>Log in or sign in to</p>
                <h2><i class="fa-solid fa-sleigh"></i> Secret Santa</h2>
            </div>
        </div>
        <div id="loginForm" class="form">
            <h2>Log in</h2>
            <form action="connexion" method="post">
                <label for="username">Email or Username</label>
                <input id="username" type="text" name="mail">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
                <button type="submit">Log in now</button>
                <p>or <a id="signinLink2" style="cursor: pointer;">Sign in</a></p>
            </form>
        </div>
        <div id="signinForm" class="form">
            <h2>Sign in</h2>
            <form action="inserer_client" method="post">
                <label for="username">Email or Username</label>
                <input id="username" type="text" name="mail">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
                <button type="submit">Sign in</button>
            </form>
        </div>
        <?php if (isset($_SESSION['erreur'])) {
					echo "<p style='color:red;'>" . $_SESSION['erreur'] . "</p>";
					unset($_SESSION['erreur']);
				}
				?>
    </div>
    <div id="overlay"></div>
    <nav class="navbar">
        <div class="brand"><i class="fa-solid fa-sleigh"></i> Secret Santa</div>
        <div class="navlinks">
            <a href="home"><i class="fa-solid fa-house"></i> Home</a>

            <?php 
                if($connected) { ?>
                <a href="deposit" class="depot"><button class="button"><i class="fa-solid fa-coins"></i> Make a deposit</button></a>
                <a href="" class="admin"><button class="button"><i class="fa-solid fa-gifts"></i> Get gift</button></a>
                <a href=""><i class="fa-solid fa-user"></i> Profile</a>

            <?php } else { ?>
                <a id="loginLink" style="cursor: pointer;" class="navlink"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                <a id="signinLink" style="cursor: pointer;"  class="navlink"><i class="fa-solid fa-user-plus"></i> Sign in</a>
            <?php } ?>
            <a href="deconnexion">log out</a>
        </div>
    </nav>    
    <?php include ($view.".php"); ?>
</body>   
<script src="assets/script/script.js"></script> 
</html>