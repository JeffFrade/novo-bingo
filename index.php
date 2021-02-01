<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use App\Number;
    use App\Session;

    $session = new Session();
    $session->initSession();

    $number = new Number();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">
        <title>Bingo</title>
    </head>

    <body>
        <div class="container">
            <h1 class="text-center">Bingo</h1>
            <hr/>
            <div class="row">
                <div class="col-sm-6">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <?php
                                if (isset($_POST['btnSort'])) {
                                    $number = $number->sortNumber();
                                    $message = '<h3>Todos os números já foram sorteados</h3>';

                                    if ($number > 0) {
                                        $message = sprintf('<h3>O número sorteado foi: %s</h3>', $number);
                                    }

                                    echo $message;
                                }
                            ?>
                        </div>

                        <button type="submit" id="btnSort" name="btnSort" class="btn btn-primary"><i class="fa fa-cogs"></i>&nbsp; Sortear</button>
                        <button type="submit" id="btnClear" name="btnClear" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp; Limpar</button>

                        <?php
                            if (isset($_POST['btnClear'])) {
                                $number->clearSortedNumbers();
                                header('Location: index.php');
                            }
                        ?>
                    </form>
                </div>

                <div class="col-sm-6">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">B</th>
                                <th class="text-center">I</th>
                                <th class="text-center">N</th>
                                <th class="text-center">G</th>
                                <th class="text-center">O</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                for ($i = 1; $i <= 15; $i++) {
                                    echo '<tr>';
                                    echo '<td class="text-center ' . (in_array($i, $_SESSION['sorted'] ?? [])?'table-success':'') . '">' . ($i) . '</td>';
                                    echo '<td class="text-center ' . (in_array(($i + 15), $_SESSION['sorted'] ?? [])?'table-success':'') . '">' . ($i + 15) . '</td>';
                                    echo '<td class="text-center ' . (in_array(($i + 30), $_SESSION['sorted'] ?? [])?'table-success':'') . '">' . ($i + 30) . '</td>';
                                    echo '<td class="text-center ' . (in_array(($i + 45), $_SESSION['sorted'] ?? [])?'table-success':'') . '">' . ($i + 45) . '</td>';
                                    echo '<td class="text-center ' . (in_array(($i + 60), $_SESSION['sorted'] ?? [])?'table-success':'') . '">' . ($i + 60) . '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>
