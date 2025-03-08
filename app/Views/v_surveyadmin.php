<table>
    <tr><th>Survey ID</th><th>Total Responses</th></tr>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row->id_survey ?></td>
            <td><?= $row->total ?></td>
        </tr>
    <?php endforeach; ?>
</table>