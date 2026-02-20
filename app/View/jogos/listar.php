<?php 

        if(empty($jogo)) {
            echo "<p>Nenhum jogo encontrado!</p>";
            echo "<a href='View/jogos/cadastrar.php'>Cadastrar</a>";
            return;
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href='View/jogos/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>Seleção Mandante</th><th>Seleção Visitante</th><th>Data/Hora</th><th>Estádio</th><th>Grupo</th><th>Ações</th></tr>";
    

    foreach ($classificacoes as $classificacao) {
        $id = $classificacao['id'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$jogo['selecao_m']}</td>";
        echo "<td>{$jogo['selecao_v']}</td>";
        echo "<td>{$jogo['data_hora']}</td>";
        echo "<td>{$jogo['estadio']}</td>";
        echo "<td>{$jogo['grupo']}</td>";
        echo "<td>
        
                <a href='View/jogos/editar.php?id={$id}'>Editar</a> | 
                <a href='View/jogos/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este jogo?')\">Deletar</a> | 
                
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>