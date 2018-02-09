<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_SeguimientoCertificado extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //--------------SIAF-----------------------------------------------------------------------------------------------------------------------------

    public function listarSeguimientoCertificado($anio, $sec_ejec)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select  distinct act_proy_nombre.ano_eje, act_proy_nombre.act_proy, act_proy_nombre.tipo_act_proy, act_proy_nombre.nombre, act_proy_nombre.estado,
									act_proy_nombre.ambito, act_proy_nombre.es_presupuestal, act_proy_nombre.sector_snip, act_proy_nombre.naturaleza_snip, act_proy_nombre.intervencion_snip,
									act_proy_nombre.tipo_proyecto, act_proy_nombre.proyecto_snip, act_proy_nombre.ambito_en, act_proy_nombre.es_foniprel, act_proy_nombre.ambito_programa,
									act_proy_nombre.es_generico, act_proy_nombre.costo_actual, act_proy_nombre.costo_expediente, act_proy_nombre.costo_viabilidad,
									act_proy_nombre.ejecucion_ano_anterior, act_proy_nombre.ind_viabilidad
									FROM            act_proy_nombre, meta
									WHERE        act_proy_nombre.ano_eje = meta.ano_eje AND act_proy_nombre.act_proy = meta.act_proy AND (val(meta.sec_ejec) = val('" . $sec_ejec . "')) AND
									(act_proy_nombre.ano_eje ='" . $anio . "') ");
        return $data->result();
    }

    public function meta($anio, $sec_ejec)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select  meta.ano_eje, meta.sec_ejec, meta.sec_func, meta.funcion, meta.programa, meta.sub_programa, meta.act_proy, meta.componente, meta.meta, meta.finalidad,
                         meta.nombre, meta.monto, meta.cantidad, meta.unidad_med, meta.departamento, meta.provincia, meta.fecha_ing, meta.usuario_ing, meta.fecha_mod,
                         meta.usuario_mod, meta.estado, meta.distrito, meta.unidad_medida, meta.cantidad_inicial, meta.unidad_medida_inicial, meta.es_pia, meta.cantidad_semestral,
                         meta.cantidad_semestral_inicial, meta.estrategia_nacional, meta.programa_ppto, meta.cantidad_trimestral_01, meta.cantidad_trimestral_01_inicial,
                         meta.cantidad_trimestral_03, meta.cantidad_trimestral_03_inicial
						 FROM            act_proy_nombre, meta
						 WHERE        act_proy_nombre.ano_eje = meta.ano_eje AND act_proy_nombre.act_proy = meta.act_proy AND (val(meta.sec_ejec) = val('" . $sec_ejec . "')) AND
						 (act_proy_nombre.ano_eje ='" . $anio . "')");
        return $data->result();
    }

    public function gasto($anio, $sec_ejec)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select    *	FROM            gasto WHERE        ano_eje = '$anio' AND (sec_ejec = '$sec_ejec')");
        return $data->result();
    }

    //--------------DBSIAF-----------------------------------------------------------------------------------------------------------------------------
    public function insert_act_proy_nombre($ano_eje, $act_proy, $tipo_act_proy, $nombre, $estado, $ambito, $es_presupuestal, $sector_snip, $naturaleza_snip, $intervencion_snip, $tipo_proyecto, $proyecto_snip, $ambito_en, $es_foniprel, $ambito_programa, $es_generico, $costo_actual, $costo_expediente, $costo_viabilidad, $ejecucion_ano_anterior, $ind_viabilidad)
    {

        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("insert into act_proy_nombre (ano_eje,act_proy,tipo_act_proy,nombre,estado,ambito,es_presupuestal,sector_snip,naturaleza_snip,intervencion_snip,tipo_proyecto,proyecto_snip,ambito_en,es_foniprel,ambito_programa,es_generico,costo_actual,costo_expediente,costo_viabilidad,ejecucion_ano_anterior,ind_viabilidad)
		  											     values('$ano_eje','$act_proy','$tipo_act_proy','$nombre','$estado','$ambito','$es_presupuestal','$sector_snip','$naturaleza_snip','$intervencion_snip','$tipo_proyecto','$proyecto_snip','$ambito_en','$es_foniprel','$ambito_programa','$es_generico','$costo_actual','$costo_expediente','$costo_viabilidad','$ejecucion_ano_anterior','$ind_viabilidad')");
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
				DECLARE @anio varchar(50)='$anio', @sec_ejec varchar(50)='$sec_ejec'

				BEGIN TRAN T1

					DELETE gasto where ( ISNULL(TRY_CAST( sec_ejec as int ),0)  = ISNULL(TRY_CAST( @sec_ejec as int ),0)) AND ano_eje = @anio
					DELETE meta	WHERE  ( ISNULL(TRY_CAST( sec_ejec as int ),0)  = ISNULL(TRY_CAST( @sec_ejec as int ),0)) AND ano_eje = @anio
					DELETE act_proy_nombre WHERE ano_eje = @anio

					/*
					DELETE gasto
					FROM           DBSIAF.dbo.act_proy_nombre INNER JOIN
									DBSIAF.dbo.meta ON act_proy_nombre.ano_eje = meta.ano_eje AND act_proy_nombre.act_proy = meta.act_proy INNER JOIN
									DBSIAF.dbo.gasto ON meta.ano_eje = gasto.ano_eje AND meta.sec_ejec = gasto.sec_ejec AND meta.sec_func = gasto.sec_func
					WHERE        ( ISNULL(TRY_CAST( meta.sec_ejec as int ),0)  = ISNULL(TRY_CAST( @sec_ejec as int ),0))
							  AND (act_proy_nombre.tipo_proyecto = '1') AND (act_proy_nombre.ano_eje = @anio)				

					--IF OBJECT_ID('tempdb.dbo.#RecordsToDelete', 'U') IS NOT NULL
					--DROP TABLE #RecordsToDelete;
					SELECT distinct meta.ano_eje, meta.act_proy INTO #RecordsToDelete
					FROM            DBSIAF.dbo.act_proy_nombre inner join DBSIAF.dbo.meta on act_proy_nombre.ano_eje = meta.ano_eje AND act_proy_nombre.act_proy = meta.act_proy
					WHERE         ( ISNULL(TRY_CAST( meta.sec_ejec as int ),0)  = ISNULL(TRY_CAST( @sec_ejec as int ),0) )
						   AND (act_proy_nombre.tipo_proyecto = '1') AND (act_proy_nombre.ano_eje = @anio)

					DELETE meta
					FROM            DBSIAF.dbo.act_proy_nombre inner join DBSIAF.dbo.meta on act_proy_nombre.ano_eje = meta.ano_eje AND act_proy_nombre.act_proy = meta.act_proy
					WHERE         ( ISNULL(TRY_CAST( meta.sec_ejec as int ),0)  = ISNULL(TRY_CAST( @sec_ejec as int ),0) )
						   AND (act_proy_nombre.tipo_proyecto = '1') AND (act_proy_nombre.ano_eje = @anio)

					DELETE act_proy_nombre
					FROM   DBSIAF.dbo.act_proy_nombre inner join #RecordsToDelete on act_proy_nombre.ano_eje = #RecordsToDelete.ano_eje
						   AND act_proy_nombre.act_proy = #RecordsToDelete.act_proy
					WHERE  (act_proy_nombre.tipo_proyecto = '1') AND (act_proy_nombre.ano_eje = @anio)

					DROP TABLE #RecordsToDelete;
					*/

				COMMIT TRAN T1");
        return true;
    }
}
