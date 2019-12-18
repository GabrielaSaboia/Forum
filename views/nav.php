<?php
?>
<div>
    <nav class="navbar navbar-expand-md">
        <ul>
            <div class="where left">
                <div class="nav-logo logo-img">
                    <img src="img/logo.png">
                </div>
                <li><a href="index.php?action=display_questions"">Home</a></li>
                <li><a href=".?action=show_question_form">Ask Something</a></li>
                <li>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="logout">
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                        <input type="submit" value="Logout">
                    </form>
                </li>
            </div>
        </ul>
    </nav>
</div>