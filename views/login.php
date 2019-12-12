<?php
include('../views/header.php');
?>


<div class=" modal-dialog text-center ">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 logo-img">
                <img  alt="Gabriela Saboia Logo" src="img/logo.png">
            </div>
            <form class="col-12" action="index.php" method="post">
                <div class="form-group">

                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Submit</button>
                </div>
                <input type="hidden" name="action" value="validate_login">
            </form>
            <div class="col-12 forgot">
                <a href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>

<?php
include('../views/footer.php');?>