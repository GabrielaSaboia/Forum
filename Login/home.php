<?php
include('../views/header.php');
include('../views/nav.php');
?>
</div>
<div class="container">
    <?php
    if ($userId == null){$userId = get_userId($email);
    }
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
            </tr>
        </thead>
        <?php foreach ($questions as $question) : ?>
            <tr scope="row">
                <td><?php echo $id = $question['id']; ?></td>
                <td><?php echo $title = $question['title']; ?></td>
                <td><?php echo $body = $question['body']; ?></td>
                <td><?php echo $skills = $question['skills']; ?></td>
                <td><button type="submit" class="btn  edit" <?php edit_question($title, $body, $skills, $id); ?>>Edit</td>
            </tr>
            <?php endforeach; ?>
    </table>
    <button type="submit" class="btn" ><a href="../views/questions.php">submit new question</a></button>
</div>
<?php include('footer'); ?>