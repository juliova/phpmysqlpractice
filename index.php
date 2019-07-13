<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>practica con php</title>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/script.js"></script>    
    </head>
    <body>
        <div class="container">
            <div id="title">
            </div>
            <table>
                <tr>
                    <th>Número</th>
                    <th>Palabra</th>
                </tr>
                <?php
                    //llamar al archivo de la base
                    include "Base.php";
                    //Conectar a la base de datos.
                    $mysqli = conectar();
                    
                    $sql = "Select * from palabras;";
                    $response = $mysqli->query($sql);
                    $response->data_seek(0);
                    while ($row = $response->fetch_assoc()) {
                        echo(
                            "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['texto'] . "</td>
                            </tr>");
                    }
                ?>
            </table>
            <div class="form">
                <span>
                    <label>Número</label>
                    <input type="text" name="id"/>
                </span>
                <br/>
                <span>
                    <label>Palabra</label>
                    <input readonly type="text" name="texto"/>
                </span>
            </div>
        </div>
    </body>
</html>

