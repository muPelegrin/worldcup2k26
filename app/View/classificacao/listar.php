<?php 

        if(empty($classificacao)) {
            echo "<p>Nenhuma classificação encontrada!</p>";
            echo "<a href='View/classificacao/cadastrar.php'>Cadastrar</a>";
            return;
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href='View/Classificacao/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>Pontos</th><th>Saldo Gols</th><th>Gols Marcados</th><th>Ações</th></tr>";
    

    foreach ($classificacoes as $classificacao) {
        $id = $classificacao['id'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$classificacao['pontos']}</td>";
        echo "<td>{$classificacao['saldo_gols']}</td>";
        echo "<td>{$classificacao['gols_marcados']}</td>";
        echo "<td>
        
                <a href='View/Classificacao/editarC.php?id={$id}'>Editar</a> | 
                <a href='View/Classificacao/deletarC.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir esta classificação?')\">Deletar</a> | 
                
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>