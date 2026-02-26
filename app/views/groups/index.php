<section>
    <h2>Cadastro de Grupos</h2>
    <form method="post" action="index.php?controller=group&action=store">
        <input name="code" placeholder="Ex.: A" maxlength="5" required>
        <button type="submit">Cadastrar Grupo</button>
    </form>

    <table>
        <tr><th>Grupo</th><th>Seleções</th><th>Ações</th></tr>
        <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= htmlspecialchars($group['code']) ?></td>
                <td>
                    <?php if (empty($group['teams'])): ?>Sem seleções<?php else: ?>
                        <?= htmlspecialchars(implode(', ', array_column($group['teams'], 'name'))) ?>
                    <?php endif; ?>
                </td>
                <td>
                    <form method="post" action="index.php?controller=group&action=update" class="inline">
                        <input type="hidden" name="id" value="<?= $group['id'] ?>">
                        <input name="code" value="<?= htmlspecialchars($group['code']) ?>" required>
                        <button type="submit">Editar</button>
                    </form>
                    <a href="index.php?controller=group&action=delete&id=<?= $group['id'] ?>" onclick="return confirm('Excluir grupo?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
