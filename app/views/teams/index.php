<section>
    <h2>Cadastro de Seleções</h2>
    <form method="post" action="index.php?controller=team&action=store">
        <input name="name" placeholder="Nome" required>
        <input name="continent" placeholder="Continente" required>
        <select name="group_id" required>
            <option value="">Grupo</option>
            <?php foreach ($groups as $group): ?>
                <option value="<?= $group['id'] ?>"><?= htmlspecialchars($group['code']) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Cadastrar</button>
    </form>

    <table>
        <tr><th>Nome</th><th>Grupo</th><th>Continente</th><th>Ações</th></tr>
        <?php foreach ($teams as $team): ?>
            <tr>
                <td><?= htmlspecialchars($team['name']) ?></td>
                <td><?= htmlspecialchars($team['group_code'] ?? '-') ?></td>
                <td><?= htmlspecialchars($team['continent']) ?></td>
                <td>
                    <form method="post" action="index.php?controller=team&action=update" class="inline">
                        <input type="hidden" name="id" value="<?= $team['id'] ?>">
                        <input name="name" value="<?= htmlspecialchars($team['name']) ?>" required>
                        <input name="continent" value="<?= htmlspecialchars($team['continent']) ?>" required>
                        <select name="group_id" required>
                            <?php foreach ($groups as $group): ?>
                                <option value="<?= $group['id'] ?>" <?= (int) $team['group_id'] === (int) $group['id'] ? 'selected' : '' ?>><?= htmlspecialchars($group['code']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Editar</button>
                    </form>
                    <a href="index.php?controller=team&action=delete&id=<?= $team['id'] ?>" onclick="return confirm('Excluir seleção?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
