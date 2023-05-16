<?php
include("models/db.php");
include_once("models/conexion.php");

$id = $_POST["palabra"];
$luno = '';
$id_luno= '';

	$lectura = ControladorFormularios::ctrSeleccionarLunos(null);

try{
  $con = Conect::conectar();
  $atm = current($con->query("select atm FROM atms where atm = $id")->fetch());
  $site_atm = current($con->query("select site_atm FROM atms where atm= $id")->fetch());
  $name_client = current($con->query("select name_client FROM atms where atm= $id")->fetch());
  $city_atm = current($con->query("select city_atm FROM atms where atm= $id")->fetch());
  $brand_atm = current($con->query("select brand_atm FROM atms where atm= $id")->fetch());
  $product_atm = current($con->query("select product_atm FROM atms where atm= $id")->fetch());
  $serial_atm = current($con->query("select serial_atm FROM atms where atm= $id")->fetch());
  $name_alarm = current($con->query("SELECT c.name_alarm from atms as a left JOIN alarms_company c on a.id_alarms_FK = c.id_alarms WHERE a.atm = $id;  ")->fetch());

}catch(PDOException $e){
  echo $sql . "<br>" . $e->getMessage();
}

if (!isset($_SESSION["validar"]) || $_SESSION["validar"] != "ok" ){
    echo '<script> window.location = "index.php?pagina=login";</script>';
    return;
}

$lectura = ControladorFormularios::ctrSeleccionar(null);

error_reporting(0);  


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="src/style/management_alarms.css">
    <link rel="stylesheet" href="src/style/dashboard.css">

</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="src/images/logo.svg" class="logo-sidebar" alt="Logo Diebold Nixdorf">
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">My Store</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="index.php?pagina=logout" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="src/images/users.png">
            </a>
            <span class="triangulo"></span>
            <span class="menu" id="menu">
                <p class="menu-user"><?php
                echo $_SESSION['user_name'];
            ?></p>
                <p><?php 
                date_default_timezone_set("America/Bogota");
                echo date("d/m/Y | H:iA");
            ?></p>
                <li>
                    <a href="#" class="logout">
                        <i class='bx bxs-log-out-circle'></i>
                        <a href="index.php?pagina=logout"><span class="text">Logout</span></a>
                    </a>
                </li>
            </span>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Central Alarmas: <?php echo $name_alarm ?></h3>
                        <a href="index.php?paginaAdmin=managementAlarmsAdmin" class="btn-download">
                            <i class='bx bxs-left-arrow'></i>
                            <span class="text">Volver a la pagina Anterior</span>
                        </a>
                    </div>
                    <div class="container">
                        <?php foreach($lectura as $key=>$value) ?>


                        <table id="table" border="1" style="border: none; border-bottom:solid; border-top:solid; border-color:#d5c6c6;">
                            <tr style="border-bottom:solid; border-color:#d5c6c6;">
                                <th>Luno</th>
                                <th>Site</th>
                                <th>Ciudad</th>
                                <th>Central Alarmas</th>
                            </tr>
                            <tr>
                                <?php foreach($lectura as $key=>$value) ?>
                                <th class="row1" id="row1" name="id"><?php echo $atm; ?></th>
                                <th id="row2" name="row2"><?php echo $site_atm; ?></th>
                                <th id="row2" name="row2"><?php echo $city_atm; ?></th>
                                <th><?php echo $name_alarm ?></th>
                            </tr>
                        </table> <BR>
                        </table> <BR>
                        <input type="datetime" name="date" id="date" value="<?php 
                date_default_timezone_set("America/Bogota");
                echo date("Y/m/d\ H:i:s");
            ?>" hidden>
                                <table style="border: none;" class="table-infos table">
                                    <tr style="border-bottom:solid; border-top:solid; border-color:#d5c6c6;">
                                        <th scope="row">
                                            Luno:
                                        </th>
                                        <td><?php echo $atm; ?></td>
                                        <th scope="row">
                                            Sitio:
                                        </th>
                                        <td colspan="2"><?php echo $site_atm; ?></td>
                                        <th scope="row"> 
                                            Ciudad:
                                        </th>
                                        <td colspan="1"><?php echo $city_atm; ?></td>
                                    </tr>
                                    <tr style="border-bottom:solid; border-color:#d5c6c6;">
                                        <th scope="row">
                                            Centar Alarma:
                                        </th>
                                        <td>
                                            <?php echo $name_alarm ?>
                                        </td>
                                        <th scope="col">
                                            Dirección Sitio:
                                        </th>
                                        <td colspan="2">
                                            CALLE 54 # 14 - 14
                                        </td>
                                        <th scope="col">
                                            Marca:
                                        </th>
                                        <td>
                                            <?php echo $brand_atm ?>
                                        </td>
                                    </tr>
                                    <tr style="border-bottom:solid; border-color:#d5c6c6;">
                                        <th scope="col">
                                            Serial:
                                        </th>
                                        <td><?php echo $serial_atm ?></td>
                                        <th scope="col">
                                            Modelo de producto:
                                        </th>
                                        <td colspan="2">
                                            <?php echo $product_atm ?>
                                        </td>
                                        <th scope="col">
                                            Cliente:
                                        </th>
                                        <td><?php echo $name_client ?></td>
                                    </tr>
                                </table>
                                <table border="1" class="table-infoss table" style="border-bottom:solid;border-top:solid; border-color:#d5c6c6;">
                                    <tr>
                                        <th style="width: 11em;" scope="row">Accion a realizar:
                                        </th>
                                        <td id="full-prube" colspan="2" style="border-right: none;" >
                                        <form action="index.php?pagina=insert_select" method="POST">
                                            <select name="idAction" class="action" id="action" style="color: #000">
                                                <option value="" selected disabled>-- Seleccionar --</option>
                                                <?php 
                                                    $v = mysqli_query($conn, "SELECT * FROM alarm_action");
                                                    while($actions = mysqli_fetch_row($v)){
                                                    ?>
                                                    <option value="<?php echo $actions[0] ?>"><?php echo $actions[1] ?></option>
                                                <?php }?>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </table>
                        <div id="form">
                            <input value="<?php echo $_SESSION['user_name']; ?>" id="users" name="users" hidden>


                        </div>
                        <div id="hola">

                        </div>
                    </div>
                </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="src/js/Management_alarms.js"></script>
    <script src="src/js/dashboard.js"></script>

</body>

</html>