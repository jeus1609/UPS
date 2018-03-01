<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_SeguimientoCertificado extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function listarSeguimientoCertificado($anio, $sec_ejec)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select * FROM act_proy_nombre where ano_eje = '".$anio."' ");
        return $data->result();
    }

    public function meta($anio, $sec_ejec)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select  * from meta where ano_eje = '".$anio."' ");
        return $data->result();
    }

    public function gasto($anio, $sec_ejec)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select * FROM gasto where ano_eje = '".$anio."' ");
        return $data->result();
    }

    //--------------DBSIAF-----------------------------------------------------------------------------------------------------------------------------
    public function insert_act_proy_nombre($ano_eje, $act_proy, $tipo_act_proy, $nombre, $estado, $ambito, $es_presupuestal, $sector_snip, $naturaleza_snip, $intervencion_snip, $tipo_proyecto, $proyecto_snip, $ambito_en, $es_foniprel, $ambito_programa, $es_generico, $costo_actual, $costo_expediente, $costo_viabilidad, $ejecucion_ano_anterior, $ind_viabilidad)
    {
        $caracteres_prohibidos = array("'","/","<",">",";");    
        $nuevo_nombre = str_replace($caracteres_prohibidos," ",$nombre);
        
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("insert into act_proy_nombre (ano_eje,act_proy,tipo_act_proy,nombre,estado,ambito,es_presupuestal,sector_snip,naturaleza_snip,intervencion_snip,tipo_proyecto,proyecto_snip,ambito_en,es_foniprel,ambito_programa,es_generico,costo_actual,costo_expediente,costo_viabilidad,ejecucion_ano_anterior,ind_viabilidad)
		  											     values('$ano_eje','$act_proy','$tipo_act_proy','$nuevo_nombre','$estado','$ambito','$es_presupuestal','$sector_snip','$naturaleza_snip','$intervencion_snip','$tipo_proyecto','$proyecto_snip','$ambito_en','$es_foniprel','$ambito_programa','$es_generico','$costo_actual','$costo_expediente','$costo_viabilidad','$ejecucion_ano_anterior','$ind_viabilidad')");
        return true;
    }

    public function insert_Meta($ano_eje, $sec_ejec, $sec_func, $funcion, $programa, $sub_programa, $act_proy, $componente, $meta, $finalidad, $nombre, $monto, $cantidad, $unidad_med, $departamento,
        $provincia, $fecha_ing, $usuario_ing, $fecha_mod, $usuario_mod, $estado, $distrito, $unidad_medida, $cantidad_inicial, $unidad_medida_inicial, $es_pia, $cantidad_semestral,
        $cantidad_semestral_inicial, $estrategia_nacional, $programa_ppto, $cantidad_trimestral_01, $cantidad_trimestral_01_inicial, $cantidad_trimestral_03,
        $cantidad_trimestral_03_inicial) {

        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("insert into meta (ano_eje, sec_ejec, sec_func, funcion, programa, sub_programa, act_proy, componente, meta, finalidad, nombre, monto, cantidad, unidad_med, departamento,
							                         provincia, fecha_ing, usuario_ing, fecha_mod, usuario_mod, estado, distrito, unidad_medida, cantidad_inicial, unidad_medida_inicial, es_pia, cantidad_semestral,
							                         cantidad_semestral_inicial, estrategia_nacional, programa_ppto, cantidad_trimestral_01, cantidad_trimestral_01_inicial, cantidad_trimestral_03,
							                         cantidad_trimestral_03_inicial) values ('$ano_eje', '$sec_ejec', '$sec_func', '$funcion', '$programa', '$sub_programa', '$act_proy', '$componente', '$meta', '$finalidad', '$nombre', $monto, $cantidad, '$unidad_med', '$departamento',
																                         	'$provincia', '$fecha_ing', '$usuario_ing', '$fecha_mod', '$usuario_mod', '$estado', '$distrito', '$unidad_medida', $cantidad_inicial, '$unidad_medida_inicial', '$es_pia', '$cantidad_semestral',
																                         	'$cantidad_semestral_inicial', '$estrategia_nacional', '$programa_ppto', '$cantidad_trimestral_01', '$cantidad_trimestral_01_inicial', '$cantidad_trimestral_03',
																                         	'$cantidad_trimestral_03_inicial')");
        return true;
    }

    public function insert_Gasto($ano_eje, $sec_ejec, $origen, $fuente_financ, $tipo_recurso, $sec_func, $categ_gasto, $grupo_gasto, $modalidad_gasto, $elemento_gasto, $presupuesto, $m01, $m02, $m03, $m04, $m05, $m06, $m07, $m08, $m09, $m10, $m11, $m12, $modificacion, $ejecucion, $monto_a_solicitado, $monto_de_solicitado, $ampliacion, $credito, $id_clasificador, $monto_financ1, $monto_financ2, $compromiso, $devengado, $girado, $pagado, $monto_certificado, $monto_comprometido_anual, $monto_precertificado)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("insert INTO [dbo].[gasto]
	           (
	           [ano_eje], [sec_ejec], [origen], [fuente_financ], [tipo_recurso], [sec_func], [categ_gasto], [grupo_gasto], [modalidad_gasto], [elemento_gasto], [presupuesto], [m01], [m02], [m03], [m04], [m05], [m06], [m07], [m08], [m09], [m10], [m11], [m12], [modificacion], [ejecucion], [monto_a_solicitado], [monto_de_solicitado], [ampliacion], [credito], [id_clasificador], [monto_financ1], [monto_financ2], [compromiso], [devengado], [girado], [pagado], [monto_certificado], [monto_comprometido_anual], [monto_precertificado]
	           )
	     VALUES
	           (
	           '$ano_eje', '$sec_ejec', '$origen', '$fuente_financ', '$tipo_recurso', '$sec_func', '$categ_gasto', '$grupo_gasto', '$modalidad_gasto', '$elemento_gasto', '$presupuesto', '$m01', '$m02', '$m03', '$m04', '$m05', '$m06', '$m07', '$m08', '$m09', '$m10', '$m11', '$m12', '$modificacion', '$ejecucion', '$monto_a_solicitado', '$monto_de_solicitado', '$ampliacion', '$credito', '$id_clasificador', '$monto_financ1', '$monto_financ2', '$compromiso', '$devengado', '$girado', '$pagado', '$monto_certificado', '$monto_comprometido_anual', '$monto_precertificado'
	           )");
        return true;
    }

    public function EliminarDataSIAFLocalSeguimientoAnio($anio, $sec_ejec) //Delet
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("
                DECLARE @anio varchar(50)='$anio'
                BEGIN TRAN T1
                    DELETE gasto where ano_eje = @anio
                    DELETE meta WHERE ano_eje = @anio                    
                    DELETE act_proy_nombre WHERE ano_eje = @anio
                COMMIT TRAN T1");
        return true;
    }
}
