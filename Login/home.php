<?php
include('views/header.php');
include('views/nav.php');
?>
</div>
<div class="container">
    <?php


    echo '<h1 class="display-4">'; echo get_username($userId); echo '</h1>';
    /*$questionHistory = get_questions($userId);*/?>
    <table class="table table-light table-bordered" >
        <thead class="thead-light">
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Skills</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php foreach ($questions as $question) : ?>
            <tr scope="row">
                <td><?php echo $id = $question['id']; ?></td>
                <td><?php echo $title = $question['title']; ?></td>
                <td><?php echo $body = $question['body']; ?></td>
                <td><?php echo $skills = $question['skills']; ?></td>
                <td>
                    <form>
                        <input type="hidden" name="action" value="view_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                        <input type="hidden" name="userId" value="<?php echo $userId ?>">

                    <input type="submit" class="btn edit" value="View" >
                    </form>
                </td>

                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                        <input type="hidden" name="userId" value="<?php echo $userId ?>">

                        <input class="btn edit" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>

    <!--<button type="submit" formmethod="post"><a href=".?action=new_question">New Question</a></button>-->
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="show_question_form">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <input type="submit" value="New Question" class="btn">
    </form>
    </div>
<?php include('views/footer.php'); ?>