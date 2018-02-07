<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Model_SeguimientoCertificado extends CI_Model 
{
 	public function __construct()
    {
        parent::__construct();
    }
  //--------------SIAF-----------------------------------------------------------------------------------------------------------------------------

    function listarSeguimientoCertificado($anio, $sec_ejec)
	 {

		 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select  distinct act_proy_nombre.ano_eje, act_proy_nombre.act_proy, act_proy_nombre.tipo_act_proy, act_proy_nombre.nombre, act_proy_nombre.estado, 
									act_proy_nombre.ambito, act_proy_nombre.es_presupuestal, act_proy_nombre.sector_snip, act_proy_nombre.naturaleza_snip, act_proy_nombre.intervencion_snip, 
									act_proy_nombre.tipo_proyecto, act_proy_nombre.proyecto_snip, act_proy_nombre.ambito_en, act_proy_nombre.es_foniprel, act_proy_nombre.ambito_programa, 
									act_proy_nombre.es_generico, act_proy_nombre.costo_actual, act_proy_nombre.costo_expediente, act_proy_nombre.costo_viabilidad, 
									act_proy_nombre.ejecucion_ano_anterior, act_proy_nombre.ind_viabilidad
									FROM            act_proy_nombre, meta
									WHERE        act_proy_nombre.ano_eje = meta.ano_eje AND act_proy_nombre.act_proy = meta.act_proy AND (val(meta.sec_ejec) = val('".$sec_ejec."')) AND 
									(act_proy_nombre.tipo_proyecto = '1')  AND (act_proy_nombre.ano_eje ='".$anio."') "); 
		 return $data->result();
	 }
	 function meta($anio, $sec_ejec)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select  meta.ano_eje, meta.sec_ejec, meta.sec_func, meta.funcion, meta.programa, meta.sub_programa, meta.act_proy, meta.componente, meta.meta, meta.finalidad, 
                         meta.nombre, meta.monto, meta.cantidad, meta.unidad_med, meta.departamento, meta.provincia, meta.fecha_ing, meta.usuario_ing, meta.fecha_mod, 
                         meta.usuario_mod, meta.estado, meta.distrito, meta.unidad_medida, meta.cantidad_inicial, meta.unidad_medida_inicial, meta.es_pia, meta.cantidad_semestral, 
                         meta.cantidad_semestral_inicial, meta.estrategia_nacional, meta.programa_ppto, meta.cantidad_trimestral_01, meta.cantidad_trimestral_01_inicial, 
                         meta.cantidad_trimestral_03, meta.cantidad_trimestral_03_inicial
						 FROM            act_proy_nombre, meta
						 WHERE        act_proy_nombre.ano_eje = meta.ano_eje AND act_proy_nombre.act_proy = meta.act_proy AND (val(meta.sec_ejec) = val('".$sec_ejec."')) AND 
						 (act_proy_nombre.tipo_proyecto = '1') AND (act_proy_nombre.ano_eje ='".$anio."')"); 
		return $data->result();
	 }

	  function gasto($anio, $sec_ejec)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select    *	FROM            gasto WHERE        ano_eje = '$anio' AND (sec_ejec = '$sec_ejec')"); 
		return $data->result();
	 }

	 function generica($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM generica WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	 function subgenerica($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM subgenerica WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	 function subgenerica_det($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM subgenerica_det WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	 function especifica($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM especifica WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	 function especifica_det($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM especifica_det WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	 function tipo_transaccion($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM tipo_transaccion WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	 function fuente_financ($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM fuente_financ WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	 function finalidad($anio)
	 {
	 	 $db_prueba = $this->load->database('SIAF', TRUE);
		 $data =$db_prueba->query("select *	FROM finalidad WHERE ano_eje = '$anio'"); 
		return $data->result();
	 }

	  //--------------DBSIAF-----------------------------------------------------------------------------------------------------------------------------
	 function insert_act_proy_nombre($ano_eje,$act_proy,$tipo_act_proy,$nombre,$estado,$ambito,$es_presupuestal,$sector_snip,$naturaleza_snip,$intervencion_snip,$tipo_proyecto,$proyecto_snip,$ambito_en,$es_foniprel,$ambito_programa,$es_generico,$costo_actual,$costo_expediente,$costo_viabilidad,$ejecucion_ano_anterior,$ind_viabilidad)
	 {

		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("insert into act_proy_nombre (ano_eje,act_proy,tipo_act_proy,nombre,estado,ambito,es_presupuestal,sector_snip,naturaleza_snip,intervencion_snip,tipo_proyecto,proyecto_snip,ambito_en,es_foniprel,ambito_programa,es_generico,costo_actual,costo_expediente,costo_viabilidad,ejecucion_ano_anterior,ind_viabilidad)
		  											     values('$ano_eje','$act_proy','$tipo_act_proy','$nombre','$estado','$ambito','$es_presupuestal','$sector_snip','$naturaleza_snip','$intervencion_snip','$tipo_proyecto','$proyecto_snip','$ambito_en','$es_foniprel','$ambito_programa','$es_generico','$costo_actual','$costo_expediente','$costo_viabilidad','$ejecucion_ano_anterior','$ind_viabilidad')"); 
		 return true;
	 }


	  function insert_Meta( $ano_eje, $sec_ejec, $sec_func, $funcion, $programa, $sub_programa, $act_proy, $componente, $meta, $finalidad, $nombre, $monto, $cantidad, $unidad_med, $departamento, 
					                         	$provincia, $fecha_ing, $usuario_ing, $fecha_mod, $usuario_mod, $estado, $distrito, $unidad_medida, $cantidad_inicial, $unidad_medida_inicial, $es_pia, $cantidad_semestral, 
					                         	$cantidad_semestral_inicial, $estrategia_nacional, $programa_ppto, $cantidad_trimestral_01, $cantidad_trimestral_01_inicial, $cantidad_trimestral_03, 
					                         	$cantidad_trimestral_03_inicial)
	 {

		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("insert into meta (ano_eje, sec_ejec, sec_func, funcion, programa, sub_programa, act_proy, componente, meta, finalidad, nombre, monto, cantidad, unidad_med, departamento, 
							                         provincia, fecha_ing, usuario_ing, fecha_mod, usuario_mod, estado, distrito, unidad_medida, cantidad_inicial, unidad_medida_inicial, es_pia, cantidad_semestral, 
							                         cantidad_semestral_inicial, estrategia_nacional, programa_ppto, cantidad_trimestral_01, cantidad_trimestral_01_inicial, cantidad_trimestral_03, 
							                         cantidad_trimestral_03_inicial) values ('$ano_eje', '$sec_ejec', '$sec_func', '$funcion', '$programa', '$sub_programa', '$act_proy', '$componente', '$meta', '$finalidad', '$nombre', $monto, $cantidad, '$unidad_med', '$departamento', 
																                         	'$provincia', '$fecha_ing', '$usuario_ing', '$fecha_mod', '$usuario_mod', '$estado', '$distrito', '$unidad_medida', $cantidad_inicial, '$unidad_medida_inicial', '$es_pia', '$cantidad_semestral', 
																                         	'$cantidad_semestral_inicial', '$estrategia_nacional', '$programa_ppto', '$cantidad_trimestral_01', '$cantidad_trimestral_01_inicial', '$cantidad_trimestral_03', 
																                         	'$cantidad_trimestral_03_inicial')"); 
		 return true;
	 }
	

	 function insert_Gasto($ano_eje, $sec_ejec, $origen, $fuente_financ, $tipo_recurso, $sec_func, $categ_gasto, $grupo_gasto, $modalidad_gasto, $elemento_gasto, $presupuesto, $m01, $m02, $m03, $m04, $m05, $m06, $m07, $m08, $m09, $m10, $m11, $m12, $modificacion, $ejecucion, $monto_a_solicitado, $monto_de_solicitado, $ampliacion, $credito, $id_clasificador, $monto_financ1, $monto_financ2, $compromiso, $devengado, $girado, $pagado, $monto_certificado, $monto_comprometido_anual, $monto_precertificado)
	 {

		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("insert INTO [dbo].[gasto]
           (
           [ano_eje], [sec_ejec], [origen], [fuente_financ], [tipo_recurso], [sec_func], [categ_gasto], [grupo_gasto], [modalidad_gasto], [elemento_gasto], [presupuesto], [m01], [m02], [m03], [m04], [m05], [m06], [m07], [m08], [m09], [m10], [m11], [m12], [modificacion], [ejecucion], [monto_a_solicitado], [monto_de_solicitado], [ampliacion], [credito], [id_clasificador], [monto_financ1], [monto_financ2], [compromiso], [devengado], [girado], [pagado], [monto_certificado], [monto_comprometido_anual], [monto_precertificado]
           )
     VALUES
           (
           '$ano_eje', '$sec_ejec', '$origen', '$fuente_financ', '$tipo_recurso', '$sec_func', '$categ_gasto', '$grupo_gasto', '$modalidad_gasto', '$elemento_gasto', '$presupuesto', '$m01', '$m02', '$m03', '$m04', '$m05', '$m06', '$m07', '$m08', '$m09', '$m10', '$m11', '$m12', '$modificacion', '$ejecucion', '$monto_a_solicitado', '$monto_de_solicitado', '$ampliacion', '$credito', '$id_clasificador', '$monto_financ1', '$monto_financ2', '$compromiso', '$devengado', '$girado', '$pagado', '$monto_certificado', '$monto_comprometido_anual', '$monto_precertificado'
           )"); 
		 return true;
	 }

	 function insert_generica($ano_eje, $tipo_transaccion, $generica, $descripcion, $id_grupo_clasificador, $ambito, $estado)
	 {
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("INSERT INTO [dbo].[generica]
           ([ano_eje], [tipo_transaccion], [generica], [descripcion], [id_grupo_clasificador], [ambito], [estado])
		     VALUES
		           (
		           '$ano_eje', '$tipo_transaccion', '$generica', '$descripcion', '$id_grupo_clasificador', '$ambito', '$estado'
		           )");
		 return true;
	 }

	 function insert_subgenerica($ano_eje, $tipo_transaccion, $generica, $subgenerica, $descripcion, $ambito, $estado)
	 {
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("INSERT INTO [dbo].[subgenerica]
           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [descripcion], [ambito], [estado])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$descripcion', '$ambito', '$estado')");
		 return true;
	 }

	 function insert_subgenerica_det($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $descripcion, $categoria_gasto, $tipo_act_proy, $tipo_gasto, $ambito, $estado, $categoria_ingreso)
	 {
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("INSERT INTO [dbo].[subgenerica_det]
           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [subgenerica_det], [descripcion], [categoria_gasto], [tipo_act_proy], [tipo_gasto], [ambito], [estado], [categoria_ingreso])
			     VALUES
			           (
			           '$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$subgenerica_det', '$descripcion', '$categoria_gasto', '$tipo_act_proy', '$tipo_gasto', '$ambito', '$estado', '$categoria_ingreso'
			           )");
		 return true;
	 }

	 function insert_especifica($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $especifica, $descripcion, $ambito, $estado)
	 {
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("INSERT INTO [dbo].[especifica]
		           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [subgenerica_det], [especifica], [descripcion], [ambito], [estado])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$subgenerica_det', '$especifica', '$descripcion', '$ambito', '$estado')");
		 return true;
	 }

	 function insert_especifica_det($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $especifica, $especifica_det, $id_clasificador, $descripcion, $ambito, $estado, $exclusivo_tp)
	 {
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("INSERT INTO [dbo].[especifica_det]
		           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [subgenerica_det], [especifica], [especifica_det], [id_clasificador], [descripcion], [ambito], [estado], [exclusivo_tp])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$subgenerica_det', '$especifica', '$especifica_det', '$id_clasificador', '$descripcion', '$ambito', '$estado', '$exclusivo_tp')");
		 return true;
	 }

	 function insert_tipo_transaccion($ano_eje, $tipo_transaccion, $descripcion, $estado)
	 {
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("INSERT INTO [dbo].[tipo_transaccion]
		           ([ano_eje], [tipo_transaccion], [descripcion], [estado])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$descripcion', '$estado')");
		 return true;
	 }

	 function insert_fuente_financ($ano_eje, $origen, $fuente_financ, $nombre, $estado, $ambito, $es_presupuestal, $es_modificable, $fuente_financ_agregada, $es_pptm)
	 {
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 $data =$db_prueba->query("INSERT INTO [dbo].[fuente_financ]
	           ([ano_eje], [origen], [fuente_financ], [nombre], [estado], [ambito], [es_presupuestal], [es_modificable], [fuente_financ_agregada], [es_pptm])
	     VALUES
	           ('$ano_eje', '$origen', '$fuente_financ', '$nombre', '$estado', '$ambito', '$es_presupuestal', '$es_modificable', '$fuente_financ_agregada', '$es_pptm' )");
		 return true;
	 }

	 function insert_finalidad($ano_eje, $finalidad, $nombre, $estado, $ambito, $es_presupuestal, $ambito_en, $ambito_programa, $es_generico)
	 { 	
		 $db_prueba = $this->load->database('DBSIAF', TRUE);
		 // $data =$db_prueba->query("insert into [dbo].[finalidad]
	   	 //         ([ano_eje], [finalidad], [nombre], [estado], [ambito], [es_presupuestal], [ambito_en], [ambito_programa], [es_generico])
		 //     VALUES
		 //           ('$ano_eje', '$finalidad', '".$nombre."', '$estado', '$ambito', '$es_presupuestal', '$ambito_en', '$ambito_programa', '$es_generico')");

		//$ano_eje, $finalidad, $nombre, $estado, $ambito, $es_presupuestal, $ambito_en, $ambito_programa, $es_generico

		$data = array(
				'ano_eje' => $ano_eje,
				'finalidad' => $finalidad,
				'nombre' => $nombre,
				'estado' => $estado,
				'ambito' => $ambito,
				'es_presupuestal' => $es_presupuestal,
				'ambito_en' => $ambito_en,
				'ambito_programa' => $ambito_programa,
				'es_generico' => $es_generico

		        // 'title' => 'My title',
		        // 'name' => 'My Name',
		        // 'date' => 'My date'
		);

		//$db_prueba->insert('finalidad', $data);


		// $this->db->set('ano_eje', $ano_eje);
		// $this->db->set('finalidad', $finalidad);
		// $this->db->set('nombre', $nombre);
		// $this->db->set('estado', $estado);
		// $this->db->set('ambito', $ambito);
		// $this->db->set('es_presupuestal', $es_presupuestal);
		// $this->db->set('ambito_en', $ambito_en);
		// $this->db->set('ambito_programa', $ambito_programa);
		// $this->db->set('es_generico', $es_generico);
		// $this->db->insert('finalidad');



		 return true;
	 }

	 function EliminarDataSIAFLocalSeguimientoAnio($anio, $sec_ejec)//Delet 
	 {
	 	$db_prueba = $this->load->database('DBSIAF', TRUE);
		$data =$db_prueba->query("
				DECLARE @anio varchar(50)='$anio', @sec_ejec varchar(50)='$sec_ejec'

				BEGIN TRAN T1

					--Eliminando datos generales (clasificadores de gastos)
					delete from DBSIAF.dbo.generica where ano_eje=@anio
					delete from DBSIAF.dbo.subgenerica where ano_eje=@anio
					delete from DBSIAF.dbo.subgenerica_det where ano_eje=@anio
					delete from DBSIAF.dbo.especifica where ano_eje=@anio
					delete from DBSIAF.dbo.especifica_det where ano_eje=@anio
					delete from DBSIAF.dbo.tipo_transaccion where ano_eje=@anio
					delete from DBSIAF.dbo.fuente_financ where ano_eje=@anio
					delete from DBSIAF.dbo.finalidad where ano_eje=@anio
					

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

				COMMIT TRAN T1"); 
		return true;
	 }
}