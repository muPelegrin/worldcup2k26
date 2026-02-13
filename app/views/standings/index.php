<section>
    <h2>Classificação por Grupo</h2>
    <?php foreach ($groups as $group): ?>
        <h3>Grupo <?= htmlspecialchars($group['code']) ?></h3>
        <table>
            <tr><th>Seleção</th><th>P</th><th>J</th><th>V</th><th>E</th><th>D</th><th>GM</th><th>GS</th><th>SG</th></tr>
            <?php foreach ($tables[$group['id']] as $line): ?>
                <tr>
                    <td><?= htmlspecialchars($line['team_name']) ?></td>
                    <td><?= (int) $line['points'] ?></td>
                    <td><?= (int) $line['played'] ?></td>
                    <td><?= (int) $line['wins'] ?></td>
                    <td><?= (int) $line['draws'] ?></td>
                    <td><?= (int) $line['losses'] ?></td>
                    <td><?= (int) $line['goals_for'] ?></td>
                    <td><?= (int) $line['goals_against'] ?></td>
                    <td><?= (int) $line['goal_difference'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</section>
