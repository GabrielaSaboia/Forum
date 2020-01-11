<?php
?>
<div>
    <nav class="navbar navbar-expand-md">
        <ul class="list-inline">
            <div class="placement">
                <li>
                    <div class="nav-logo logo-img"><img src="img/logo.png"></div>
                </li>
                <li>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="logout">
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                        <input class="btn" type="submit" value="Logout">
                    </form>
                </li>
            </div>
        </ul>
    </nav>
</div>