<?php 

        if(empty($resultado)) {
            echo "<p>Nenhum resultado encontrado!</p>";
            echo "<a href='View/resultados/cadastrar.php'>Cadastrar</a>";
            return;
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href='View/resultados/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>Seleção Mandante</th><th>Seleção Visitante</th><th>Pontos</th><th>Vitorias</th><th>Empates</th><th>Derrotas</th><th>Saldo de Gols</th><th>Ações</th></tr>";
    

    foreach ($resultados as $resultado) {
        $id = $resultado['id'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$resultado['g_selecao_m']}</td>";
        echo "<td>{$resultado['g_selecao_v']}</td>";
        echo "<td>{$resultado['pontos']}</td>";
        echo "<td>{$resultado['vitorias']}</td>";
        echo "<td>{$resultado['empates']}</td>";
        echo "<td>{$resultado['derrotas']}</td>";
        echo "<td>{$resultado['saldo_gols']}</td>";
        echo "<td>
        
                <a href='View/resultados/editar.php?id={$id}'>Editar</a> | 
                <a href='View/resultados/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este resultado?')\">Deletar</a> | 
                
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>