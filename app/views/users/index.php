<section>
    <h2>Cadastro de Usuários</h2>
    <form method="post" action="index.php?controller=user&action=store">
        <input name="name" placeholder="Nome" required>
        <input type="number" min="0" name="age" placeholder="Idade" required>
        <input name="role" placeholder="Cargo" required>
        <select name="team_id" required>
            <option value="">Seleção</option>
            <?php foreach ($teams as $team): ?>
                <option value="<?= $team['id'] ?>"><?= htmlspecialchars($team['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Cadastrar</button>
    </form>

    <table>
        <tr><th>Nome</th><th>Idade</th><th>Cargo</th><th>Seleção</th><th>Ações</th></tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= (int) $user['age'] ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td><?= htmlspecialchars($user['team_name'] ?? '-') ?></td>
                <td>
                    <form method="post" action="index.php?controller=user&action=update" class="inline">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <input name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                        <input type="number" min="0" name="age" value="<?= (int) $user['age'] ?>" required>
                        <input name="role" value="<?= htmlspecialchars($user['role']) ?>" required>
                        <select name="team_id" required>
                            <?php foreach ($teams as $team): ?>
                                <option value="<?= $team['id'] ?>" <?= (int) $user['team_id'] === (int) $team['id'] ? 'selected' : '' ?>><?= htmlspecialchars($team['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Editar</button>
                    </form>
                    <a href="index.php?controller=user&action=delete&id=<?= $user['id'] ?>" onclick="return confirm('Excluir usuário?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
