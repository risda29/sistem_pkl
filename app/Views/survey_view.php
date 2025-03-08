<form action="/survey/submit" method="post">
    <?php foreach ($survey as $item): ?>
        <p><?= $survey['question'] ?></p>
        <input type="hidden" name="id_survey" value="<?= $survey['id_survey'] ?>">
        <input type="text" name="response">
        <br>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
</form>