<?php
    function titulo(){
        return 'Selecione o aluno';
    }
    function corpo(){
        require "./conec.php";
        $conn = geraCon();
        $res = $conn->prepare("SELECT cod_turma FROM profmat WHERE prof_mat = :mat");
        $res->bindParam(':mat', $_SESSION["mat"], PDO::PARAM_STR);
        $res->execute();
        $acc = $res->fetchAll(PDO::FETCH_ASSOC);
        $alunos_mat = array();
        foreach($acc as $row)
        {
            $alunos_mat[] = Array(
                "cod_turma" => $row["cod_turma"]
            );
        }
        $alunos_mat = json_encode($alunos_mat);
        $res = null;
        $conn = null;
        return <<<EOL
        <div>
            <form action="lista-aluno.php" method="post">
            Selecione a turma: </a>
            <select id="turma-sel" name="turma-sel">
            </select>
            <br>
            <input type="submit" value="Procurar">
            </form>
            <form action="./home.php" method="post">
                <input type="submit" value="Voltar">
            </form>
        </div>
        <script>
            let v = $alunos_mat;
            turmas = document.getElementById('turma-sel');
            for (var i = 0; i < v.length; i++){
                var temp = v[i].cod_turma;
                console.log(temp);
                var a1 = temp[7];
                var a2 = temp[4];
                var opt = document.createElement('option');
                opt.value = temp;
                opt.innerHTML = (a1 + "" + a2);
                turmas.appendChild(opt);
            }
        </script>
EOL;
    }
    require './default.php';
?>