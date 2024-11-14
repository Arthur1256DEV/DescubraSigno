<?php include('./layouts/header.php'); ?>

<body>
    <div class="shadow rounded w-75 mx-auto" id="container">
    <h1 class="mx-auto">Signo encontrado:</h1>
    <hr>
        <?php
                $data_nascimento = isset($_POST['infoDate']) ? $_POST['infoDate'] : "";

                $date = new DateTime($data_nascimento);

                $dia = $date->format('d');
                $mes = $date->format('m');
                $dia_mes = "$dia/$mes";



                $signos = simplexml_load_file('signos.xml');

                $signo_encontrado = null;

                foreach ($signos->signo as $signo) {

                    $data_inicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
                    $data_fim = DateTime::createFromFormat('d/m', $signo->dataFim);
                    $data_nascimento = DateTime::createFromFormat('d/m', $dia_mes);

                    if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim) {
                        $signo_encontrado = $signo;
                        echo $signo_encontrado . "<br>";
                        break;
                    }

                    if ($data_inicio > $data_fim) {
                        if (($data_nascimento >= $data_inicio && $data_nascimento <= DateTime::createFromFormat('d/m', '31/12')) ||
                            ($data_nascimento >= DateTime::createFromFormat('d/m', '01/01') && $data_nascimento <= $data_fim)) {
                            $signo_encontrado = $signo;
                            break;
                        }
                    }

                    if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim) {
                        $signo_encontrado = $signo;
                        echo $signo_encontrado . "<br>";
                        break;
                    }
                    
                }
                if ($signo_encontrado) {
                    echo "Seu signo é: " . $signo_encontrado->signoNome . "<br>";
                    echo "Período: " . $signo_encontrado->dataInicio . " até " . $signo_encontrado->dataFim . "<br>";
                } else {
                    echo "Signo não encontrado para a data de nascimento informada.<br>";
                }    
    ?>
    <hr class="border-primary">
  </div>
</body>
