<?php
    require_once("../conexion/bd.php");
    require_once("../controlador/paciente.controlador.php");
    require_once("../controlador/comida.controlador.php");
    require_once("../controlador/sueno.controlador.php");
    require_once("../controlador/observacion.controlador.php");
    $id=$_REQUEST['id'];
    $can=$_REQUEST['can'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> Frequency </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <link rel="stylesheet" href="css/estilo.css" >
    <link rel="stylesheet" href="css/animate.css" >
</head>
<body>
    <?php include('medico_barra.php'); ?>
    <br><br><br>
    <div class="container">
        <div class="row text-right">
            <i class=" fa fa-print fa-3x right" aria-hidden="true" onclick="window.print()"></i>
        </div>
        <div class="container">
            <div class="row">
                <h2 class="title text-center">Datos del Paciente</h2>
            </div>
            <?php foreach(Buscar_Paciente($id) AS $Paciente){ ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <h5>Paciente: <?php echo $Paciente['nombre'] ." ".$Paciente['apellido_p'] ." ".$Paciente['apellido_m']; ?></h5>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h5>Rut: <?php echo $id ?></h5>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h5>Fecha de Nacimiento: <?php $fec = $Paciente['fecha_nacimiento']; $fecs = strtotime($fec); echo $f = date("d-m-y",$fecs);?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <h5>Dirección: <?php echo $Paciente['direccion']; ?></h5>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h5>Ciudad: <?php echo $Paciente['ciudad']; ?></h5>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h5>Telefono: <?php echo $Paciente['telefono']; ?></h5>
                    </div>
                </div>
            <?php }?><hr>
        </div>

        <div id="apetito" class="container">
            <div class="row">
                <h2 class="title text-center">Alimentación</h2>
                <br>
            </div>
            <div class="row">
                <div id="containers" class="col-xs-12 col-sm-6 col-md-8" ></div>
                <div id="redondo"    class="col-xs-12 col-sm-6 col-md-4"  ></div>
            </div>
        </div>
        <hr>
        <div id="horas_sueno" class="container">
            <div class="row">
                <h2 class="title text-center">Horas de Sueño</h2>
                <br>
            </div>
            <div class="row">
                <div id="sueno" class="col-xs-12 " ></div>
            </div>
        </div>
        <hr>
        <div id="observaciones" class="container">
            <div class="row">
                <h2 class="title text-center">Observaciones</h2>
                <br>
            </div>
            <div class="row">
                <table class="table table-striped">
        <thead>
            <th>Fecha</th>
            <th>Contenido Observación</th>
            <th>Cuidador</th>
        </thead>
        <tbody>
        <?php foreach(Buscar_observacion($id,$can) AS $Observa){ ?>
            <tr>    
                <td><?php $fech = $Observa['fecha']; $fechasa = strtotime($fech); $fm = date("d-m-y",$fechasa); echo $fm ?></td>
                <td><?php echo $Observa['observacion'];?></td>
                <td><?php echo $Observa['fk_cuidador'];?></td>
            </tr>
        <?php }?>
        </tbody>
        <tfoot>
            <!--<button class="btn btn-primary pull-right">Agregar</button>-->
        </tfoot>
    </table>
            </div>
        </div>
    </div>

        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="js/bootbox.min.js"></script>   
<?php 
    
    //debo pasar el id del paciente
    //$id='11959992-k';
    $limite = $can;
    $nivel = "";
    $fecha = "";
    $fechas="";
    $f = "";
    $fechaw = "";
    $fechasw="";
    $fw= "";
    $alto = 0;
    $exagerado =0;
    $normal = 0;
    $bajo = 0;
    $contador = 0;

    foreach (Buscar_Comida($id,$limite) as $dato) {
        $nivel .= $dato['nivel_apetito'].",";
        $mama = $dato['nivel_apetito'];
        $contador = $contador + 1;
        switch ($mama) {
            case '1':
                $bajo = $bajo+1;
                break;
            case '2':
                $normal = $normal+1;
                break;
            case '3':
                $alto = $alto+1;
                break;
            case '4':
                $exagerado = $exagerado+1;
                break;
        }
        $fecha = $dato['fecha'];
        $fechas = strtotime($fecha);
        $f .= "'".date("d-m-y",$fechas)."'".",";
    }

    $resul =($bajo*100)/$contador;
    $resul2 = ($normal*100)/$contador;
    $resul3 = ($alto*100)/$contador;
    $resul4 = ($exagerado*100)/$contador;

    $horaI = "";
    $horaF = "";
    $horaIn = "";
    $horaFn = "";
    foreach (Buscar_Sueno($id,$limite) as $datos) {
        
        $fechaw = $datos['fecha'];
        $fechasw = strtotime($fechaw);
        $fw .= "'".date("d-m-y",$fechasw)."'".",";

        $hora = $datos['hora_inicio'];
        $r = $hora[0] . $hora[1];

        $horaf = $datos['hora_fin'];
        $fe = $horaf[0] . $horaf[1];

        $horain = $datos['interrupcion_inicio'];
        if(!$horain){
            $fi = 'null';
        }else{
            $fi = $horain[0] . $horain[1];
        }
        
        $horafn = $datos['interrupcion_fin'];
        if(!$horafn){
            $fn = 'null';
        }else{
            $fn = $horafn[0] . $horafn[1];
        }
        

        $horaI .= $r.",";
        $horaF .= $fe.",";
        $horaIn .= $fi.",";
        $horaFn .= $fn.",";
    }    

echo "  <script>
$(document).ready(function(){
    $(function () {
        Highcharts.chart('containers', {
            title: {
                text: 'Nivel de Apetito',
                x: -20 //center
            },
            subtitle: {
                text: 'Paciente',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Fecha'
                },
                categories: [$f]
            },
            yAxis: {
                title: {
                    text: 'Niveles'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Evolución',
                data: [".$nivel."]
            }]
        });
    });

//otro grafico --------------

    $(function () {
        Highcharts.chart('redondo', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Nivel de Apetito(%)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Porcentaje',
                colorByPoint: true,
                data: [{
                    name: '1 Bajo',
                    y: ".$resul."
                }, {
                    name: '2 Normal',
                    y: ".$resul2.",
                    sliced: true,
                    selected: true
                }, {
                    name: '3 Alto',
                    y: ".$resul3."
                }, {
                    name: '4 Exagerado',
                    y: ".$resul4."
                }]
            }]
        });
    });
    // otro grfico ----
    $(function () {
    Highcharts.chart('sueno', {
        title: {
            text: 'Horas de Sueño',
            x: -20 //center
        },
        subtitle: {
            text: 'Sueño e Interrupciones (Horas Aprox.)',
            x: -20
        },
        xAxis: {
            categories: [$fw]
        },
        yAxis: {
            title: {
                text: 'Horas'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' horas'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Inicio Sueño',
            data: [".$horaI."]
        }, {
            name: 'Fin Sueño',
            data: [".$horaF."]
        }, {
            name: 'Inicio Interrupción',
            data: [".$horaIn."]
        }, {
            name: 'Fin Interrupción',
            data: [".$horaFn."]
        }]
    });
});
});
</script>  ";
?>
</body>
</html>