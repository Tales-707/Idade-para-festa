<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
   <title>Aula Formulário</title>
</head>

<body>
   <form method="post" name="AulaFormulario" id="AulaFormulario" action="index.php">
      <div>
         <h3>Nome</h3>
         <input id="nome" placeholder="Nome" class="nome" name="nome" type="text">
      </div>
      <div class="caixa">
         <div>
         <h3>Homem</h3>
         <input id="idadeHomem" placeholder="Sua idade" class="idade" name="idadeHomem" type="text">
         </div>
         <div>
         <h3>Mulher</h3>
         <input id="idadeMulher" placeholder="Sua idade" class="idade" name="idadeMulher" type="text">
         </div>
      </div>
      <h5>Menor de 16 anos entra somente com acompanhante!!!!</h5>
      <div>
         <h3>Nome do acompanhante</h3>
         <input id="nomeAcompanhante" placeholder="nomeAcompanhante" class="nome do Acompanhante" name="nomeAcompanhante" type="text">
      </div>
      <div class="caixa-acompanhante">
         <div>
            <h4>Mulher </h4>
         <input id="idadeHomemAcompanhante" placeholder="idade do acompanhante" class="idadeHomemAcompanhante" name="idadeHomemAcompanhante" type="text">
         </div>
         <div>
            <h4>Homem </h4>
         <input id="idadeMulherAcompanhante" placeholder="idade do Acompanhante" class="idadeMulherAcompanhante" name="idadeMulherAcompanhante" type="text">
         </div>
      </div>
      <div>
         <button  type="submit" name="ButtonForm" id="ButtonForm" class="button-form">
            Entrar
            
         </button>
      </div>
      <?php
      if (isset($_POST['nome'])) {
         $nome = $_POST['nome'];

         if (empty($nome)) {
            echo "<p >campo nome obrigatorio</p>";
         } else {
            // PARTE DO HOMEM
            if (isset($_POST['idadeHomem']) || isset($_POST['idadeMulher'])) {
               $idadeHomem  = $_POST['idadeHomem'];
               $idadeMulher = $_POST['idadeMulher'];

               if (empty($idadeHomem)) {
                  if (empty($idadeMulher)) {
                     echo "<p >Preencha o campo idade</p>";
                  } else {
                     if ($idadeMulher >= 19) {
                        echo "<p> $nome voce pode entrar</p> ";
                     } else {
                        if (isset($_POST['nomeAcompanhante'])) {
                           $nomeAcompanhante = $_POST['nomeAcompanhante'];
                           if (empty($nomeAcompanhante)) {
                              echo "<p> nome acompanhante obrigatorio</p>";
                           } else {
                              if (isset($_POST['idadeHomemAcompanhante']) || isset($_POST['idadeMulheraAcompanhante'])) {
                                 $idadeHomemAcompanhante  = $_POST['idadeHomemAcompanhante'];
                                 $idadeMulherAcompanhante = $_POST['idadeMulherAcompanhante'];

                                 // VERIFICACAO DO CAMPO 
                                 if (empty($idadeHomemAcompanhante)) {
                                    if (empty($idadeMulherAcompanhante)) {
                                       // MULHER ACOMPANHANTE
                                       echo "<p>preencha o campo acompanhante</p>";
                                    } else {
                                       if ($idadeMulherAcompanhante > 19) {

                                          echo  "<p> $nome podem entrar no camarote acompanhado de $nomeAcompanhante </p>";
                                       } else {
                                          echo "<p>  nao podem entrar </p>";
                                       }
                                    }
                                    // HOMEM ACOMPANHANTE
                                 } else {
                                    if ($idadeHomemAcompanhante > 18) {
                                       echo "<p>$nome podem entrar acompanhado de $nomeAcompanhante </p>";
                                    } else {
                                       echo "<p> nao podem entrar </p>";
                                    }
                                 }
                              }
                           }
                        }
                     }
                  }
                  // IDADE DO HOMEM 
               } else {


                  if ($idadeHomem >= 18) {
                     echo "<p> $nome Voce pode entrar</p>";
                  } else {

                     // PARTE DO ACOMPANHANTE
                     if (isset($_POST['nomeAcompanhante'])) {
                        $nomeAcompanhante = $_POST['nomeAcompanhante'];

                        if (empty($nomeAcompanhante)) {
                           echo "<p>Nome do acompanhante obrigatorio</p>";
                        } else {
                           // POST EXISTEM?
                           if (isset($_POST['idadeHomemAcompanhante']) || isset($_POST['idadeMulheraAcompanhante'])) {
                              $idadeHomemAcompanhante  = $_POST['idadeHomemAcompanhante'];
                              $idadeMulherAcompanhante = $_POST['idadeMulherAcompanhante'];

                              if (empty($idadeHomemAcompanhante)) {
                                 if (empty($idadeMulherAcompanhante)) {
                                    // MULHER ACOMPANHANTE
                                    echo "<p>preencha o campo acompanhante</p>";
                                 } else {
                                    if ($idadeMulherAcompanhante > 19) {

                                       echo "<p>$nome pode entrar acompanhado de $nomeAcompanhante</p>";
                                    } else {
                                       echo "<p>nao podem entrar </p>";
                                    }
                                 }
                                 // HOMEM ACOMPANHANTE
                              } else {
                                 if ($idadeHomemAcompanhante > 18) {
                                    echo "<p>$nome pode entrar acompanhado de $nomeAcompanhante</p>";
                                 } else {
                                    echo "<p> nao podem entrar </p>r";
                                 }
                              }
                           }
                        }
                     }
                  }
               }
            }
         }
      }
      ?>
   </form>

</body>

</html>