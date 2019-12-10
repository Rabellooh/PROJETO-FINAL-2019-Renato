<?php
    function titulo(){
        return 'Bem vindo(a) novamente';
    }
    function corpo(){
        $a = $_SESSION["nome"];
        $int  = substr("0".((int)date(H)), -2);
        $int2 = substr("0".((int)date(i)), -2);
        print '<a id = "hora">'.$int.':'.$int2.' - '.'</a>'; 
        if ($int < 12){
            echo '<a id="boas-vindas">Bom dia '.$a.'</a>';
        }
        else if($int < 18){
            echo '<a id="boas-vindas">Boa tarde '.$a.'</a>';
        }
        else{
            echo '<a id="boas-vindas">Boa noite '.$a.'</a>';
        }
        return <<<EOL
        <form action="./busca-aluno.php">
            <img src="notaslogo.png" class="rounded" height="100" width="100">
            <input type="submit" value="Lançar notas" />
        </form>
        <form action="../gerar-doc.php" method="get"></form>
            <img src="imprimirlogo.png" class="rounded" height="100" width="100">
            <input type="submit" value="Imprimir documentos" />
        </form>
        <form action="../horarios.php" method="get"></form>
            <img src="horariologo.png" class="rounded" height="100" width="100">
            <input type="submit" value="Seus horários" />
        </form>
        <form action="../relatorios.php" method="get"></form>
            <img src="relatoriologo.png" class="rounded" height="100" width="100">
            <input type="submit" value="Relatorios" />
        </form>
        <br><br><br><br>
        <button><a href="./logout.php">Sair</a></button>
EOL;
    }
    require 'default.php';
?>