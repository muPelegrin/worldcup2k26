<section>
    <h2>Cadastro de Jogos</h2>
    <form method="post" action="index.php?controller=match&action=store">
        <select name="home_team_id" required>
            <option value="">Mandante</option>
            <?php foreach ($teams as $team): ?><option value="<?= $team['id'] ?>"><?= htmlspecialchars($team['name']) ?></option><?php endforeach; ?>
        </select>
        <select name="away_team_id" required>
            <option value="">Visitante</option>
            <?php foreach ($teams as $team): ?><option value="<?= $team['id'] ?>"><?= htmlspecialchars($team['name']) ?></option><?php endforeach; ?>
        </select>
        <input type="datetime-local" name="match_datetime" required>
        <input name="stadium" placeholder="Estádio" required>
        <input name="phase" placeholder="Fase (Grupo/Finais)" required>
        <select name="group_id">
            <option value="">Sem grupo</option>
            <?php foreach ($groups as $group): ?><option value="<?= $group['id'] ?>"><?= htmlspecialchars($group['code']) ?></option><?php endforeach; ?>
        </select>
        <button type="submit">Cadastrar Jogo</button>
    </form>

    <table>
        <tr><th>Jogo</th><th>Data</th><th>Estádio</th><th>Fase</th><th>Resultado</th><th>Registrar placar</th></tr>
        <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= htmlspecialchars($match['home_team']) ?> x <?= htmlspecialchars($match['away_team']) ?></td>
                <td><?= htmlspecialchars($match['match_datetime']) ?></td>
                <td><?= htmlspecialchars($match['stadium']) ?></td>
                <td><?= htmlspecialchars($match['group_code'] ? 'Grupo ' . $match['group_code'] : $match['phase']) ?></td>
                <td><?= $match['home_goals'] === null ? '-' : ((int) $match['home_goals'] . ' x ' . (int) $match['away_goals']) ?></td>
                <td>
                    <form method="post" action="index.php?controller=match&action=registerResult" class="inline">
                        <input type="hidden" name="id" value="<?= $match['id'] ?>">
                        <input type="number" min="0" name="home_goals" required>
                        <input type="number" min="0" name="away_goals" required>
                        <button type="submit">Salvar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
