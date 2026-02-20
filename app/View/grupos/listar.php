<?php 

        if(empty($grupo)) {
            echo "<p>Nenhum grupo encontrado!</p>";
            echo "<a href='View/grupos/cadastrar.php'>Cadastrar</a>";
            return;
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href='View/Grupos/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>Nome</th><th>Ações</th></tr>";
    

    foreach ($grupos as $grupo) {
        $id = $grupo['id'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$grupo['nome']}</td>";
        echo "<td>
        
                <a href='View/grupos/editar.php?id={$id}'>Editar</a> | 
                <a href='View/grupos/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este grupo?')\">Deletar</a> | 
                
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>