<?php
include('header.php');
?>

<body>
<div class=" modal-dialog text-center ">
    <div class="col-12 main-section">
        <div class="modal-content">
            <div class="col-12 logo-img">
                <img src="img/logo.png">
            </div>
            <form class="col-12" action="index.php" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" id="first_name"
                           name="first_name" placeholder="Enter First Name">
                </div>

                <input type="hidden" name="action" value="display_users">
                <input type="hidden" name="userId" value=" <?php echo $userId; ?>">

                <div class="form-group">
                    <input class="form-control" type="text" id="lastName"
                           name="lastName" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" id="birthday"
                           name="birthday" placeholder="Enter Birthday">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" id="email"
                           name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" id="password"
                           name="password" placeholder="Enter Password">

                </div>

                <div class="form-group">
                    <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>
<?
include('footer.php');