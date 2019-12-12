<?php
include('views/header.php');
include('views/nav.php');
?>

<!-- Questions box -->
<div class=" modal-dialog text-center ">
    <div class="col-12  main-section">
        <div class="modal-content">
            <div class="col-12 logo-img">

            </div>
            <form class="col-12" action="index.php" method="post">
                <input type="hidden" name="action" value="new_question">
                <input type="hidden" name="userId" value="<?php echo $userId; ?>">

                <div class="form-group">
                    <input class="form-control" type="text" id="questionName"
                           name="questionName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                            <textarea class="form-control" id="body"
                                      name="body" placeholder="Enter Question Body"></textarea>
                </div>
                <div class="form-group">
                            <textarea class="form-control" id="skills"
                                      name="skills" placeholder='Enter skills'></textarea>
                </div>
                      <div class="form-group">
                    <button type="submit" class="btn">
                        <i class="fas fa-sign-in-alt"></i>
                        Submit
                    </button>
                </div>
            </form>
        </div><!--End modal content-->
    </div>
</div>

<?php include('views/footer.php'); ?>