<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImporSeguimientoCertificado extends CI_Controller {

	public function __construct(){
      parent::__construct();
        $this->load->model("Model_SeguimientoCertificado");

	}

	public function view($page = 'home')
	{
		
	}

	public function inicio($anio=null)
	{
		$this->load->view('layout/header');
		$this->load->view('seguimiento/inicio',['anio' =>$anio]);
		$this->load->view('layout/footer');
	}

	public function importar()
	{
	set_time_limit(0);  
    ini_set('memory_limit', '-1'); 
	$anio=$this->input->post('anio');
	if(is_numeric($anio))
	{

	
		if(count($this->Model_SeguimientoCertificado->listarSeguimientoCertificado($anio))>0)
		{
		
			try { 
					$time_start = microtime(true);
					$this->db->trans_start();
					//$this->Model_SeguimientoCertificado->DeleteGasto($anio);
					//$this->Model_SeguimientoCertificado->Deletemeta($anio);
					//$this->Model_SeguimientoCertificado->DeletelistarSeguimientoCertificado($anio);
					$this->Model_SeguimientoCertificado->EliminarDataSIAFLocalSeguimientoAnio($anio);//gasto
					if($_POST)
					{
						
						$dataSeguimientoCertificado=$this->Model_SeguimientoCertificado->listarSeguimientoCertificado($anio);//act_proy_nombre
						foreach ($dataSeguimientoCertificado as  $itemp) {
							$ano_eje=$itemp->ano_eje;
							$act_proy=$itemp->act_proy;
							$tipo_act_proy=$itemp->tipo_act_proy;
							$nombre=$itemp->nombre;
							$estado=$itemp->estado;
							$ambito=$itemp->ambito;
							$es_presupuestal=$itemp->es_presupuestal;
							$sector_snip=$itemp->sector_snip;
							$naturaleza_snip=$itemp->naturaleza_snip;
							$intervencion_snip=$itemp->intervencion_snip;
							$tipo_proyecto=$itemp->tipo_proyecto;
							$proyecto_snip=$itemp->proyecto_snip;
							$ambito_en=$itemp->ambito_en;
							$es_foniprel=$itemp->es_foniprel;
							$ambito_programa=$itemp->ambito_programa;
							$es_generico=$itemp->es_generico;
							$costo_actual=$itemp->costo_actual;
							$costo_expediente=$itemp->costo_expediente;
							$costo_viabilidad=$itemp->costo_viabilidad;
							$ejecucion_ano_anterior=$itemp->ejecucion_ano_anterior;
							$ind_viabilidad=$itemp->ind_viabilidad;
							$this->Model_SeguimientoCertificado->insert_act_proy_nombre($ano_eje,$act_proy,$tipo_act_proy,$nombre,$estado,$ambito,$es_presupuestal,$sector_snip,$naturaleza_snip,$intervencion_snip,$tipo_proyecto,$proyecto_snip,$ambito_en,$es_foniprel,$ambito_programa,$es_generico,$costo_actual,$costo_expediente,$costo_viabilidad,$ejecucion_ano_anterior,$ind_viabilidad);
						}
						$meta=$this->Model_SeguimientoCertificado->meta($anio);
						foreach ($meta as  $itemp) {
								$ano_eje=$itemp->ano_eje;
								$sec_ejec=$itemp->sec_ejec;
								$sec_func=$itemp->sec_func;
								$funcion=$itemp->funcion;
								$programa=$itemp->programa;
								$sub_programa=$itemp->sub_programa;
								$act_proy=$itemp->act_proy;
								$componente=$itemp->componente;
								$meta=$itemp->meta;
								$finalidad=$itemp->finalidad;
								$nombre=$itemp->nombre;
								$monto=$itemp->monto;
								$cantidad=$itemp->cantidad;
								$unidad_med=$itemp->unidad_med;
								$departamento=$itemp->departamento;
								$provincia=$itemp->provincia;
								$fecha_ing=$itemp->fecha_ing;
								$usuario_ing=$itemp->usuario_ing;
								$fecha_mod=$itemp->fecha_mod;
								$usuario_mod=$itemp->usuario_mod;
								$estado=$itemp->estado;
								$distrito=$itemp->distrito;
								$unidad_medida=$itemp->unidad_medida;
								$cantidad_inicial=$itemp->cantidad_inicial;
								$unidad_medida_inicial=$itemp->unidad_medida_inicial;
								$es_pia=$itemp->es_pia;
								$cantidad_semestral=$itemp->cantidad_semestral;
								$cantidad_semestral_inicial=$itemp->cantidad_semestral_inicial;
								$estrategia_nacional=$itemp->estrategia_nacional;
								$programa_ppto=$itemp->programa_ppto;
								$cantidad_trimestral_01=$itemp->cantidad_trimestral_01;
								$cantidad_trimestral_01_inicial=$itemp->cantidad_trimestral_01_inicial;
								$cantidad_trimestral_03=$itemp->cantidad_trimestral_03;
								$cantidad_trimestral_03_inicial=$itemp->cantidad_trimestral_03_inicial;
								$this->Model_SeguimientoCertificado->insert_Meta( $ano_eje, $sec_ejec, $sec_func, $funcion, $programa, $sub_programa, $act_proy, $componente, $meta, $finalidad, $nombre, $monto, $cantidad, $unidad_med, $departamento, 
					                         	$provincia, $fecha_ing, $usuario_ing, $fecha_mod, $usuario_mod, $estado, $distrito, $unidad_medida, $cantidad_inicial, $unidad_medida_inicial, $es_pia, $cantidad_semestral, 
					                         	$cantidad_semestral_inicial, $estrategia_nacional, $programa_ppto, $cantidad_trimestral_01, $cantidad_trimestral_01_inicial, $cantidad_trimestral_03, 
					                         	$cantidad_trimestral_03_inicial);
						}
						
						$gasto=$this->Model_SeguimientoCertificado->gasto($anio);
						foreach ($gasto as $itemp) {
							$ano_eje=$itemp->ano_eje;
								$sec_ejec=$itemp->sec_ejec;
								$origen=$itemp->origen;
								$fuente_financ=$itemp->fuente_financ;
								$tipo_recurso=$itemp->tipo_recurso;
								$sec_func=$itemp->sec_func;
								$categ_gasto=$itemp->categ_gasto;
								$grupo_gasto=$itemp->grupo_gasto;
								$modalidad_gasto=$itemp->modalidad_gasto;
								$elemento_gasto=$itemp->elemento_gasto;
								$presupuesto=$itemp->presupuesto;
								$m01=$itemp->m01;
								$m02=$itemp->m02;
								$m03=$itemp->m03;
								$m04=$itemp->m04;
								$m05=$itemp->m05;
								$m06=$itemp->m06;
								$m07=$itemp->m07;
								$m08=$itemp->m08;
								$m09=$itemp->m09;
								$m10=$itemp->m10;
								$m11=$itemp->m11;
								$m12=$itemp->m12;
								$modificacion=$itemp->modificacion;
								$ejecucion=$itemp->ejecucion;
								$monto_a_solicitado=$itemp->monto_a_solicitado;
								$monto_de_solicitado=$itemp->monto_de_solicitado;
								$ampliacion=$itemp->ampliacion;
								$credito=$itemp->credito;
								$id_clasificador=$itemp->id_clasificador;
								$monto_financ1=$itemp->monto_financ1;
								$monto_financ2=$itemp->monto_financ2;
								$compromiso=$itemp->compromiso;
								$devengado=$itemp->devengado;
								$girado=$itemp->girado;
								$pagado=$itemp->pagado;
								$monto_certificado=$itemp->monto_certificado;
								$monto_comprometido_anual=$itemp->monto_comprometido_anual;
								$monto_precertificado=$itemp->monto_precertificado;
								$this->Model_SeguimientoCertificado->insert_Gasto($ano_eje, $sec_ejec, $origen, $fuente_financ, $tipo_recurso, $sec_func, $categ_gasto,$grupo_gasto,
					                         $modalidad_gasto, $elemento_gasto, $presupuesto, $m01, $m02, $m03, $m04, $m05, $m06, $m07, $m08, 
					                         $m09, $m10, $m11, $m12, $modificacion, $ejecucion, $monto_a_solicitado, $monto_de_solicitado, $ampliacion, 
					                         $credito, $id_clasificador, $monto_financ1, $monto_financ2, $compromiso, $devengado, $girado, $pagado, 
					                         $monto_certificado, $monto_comprometido_anual, $monto_precertificado);
						}

						$time_end = microtime(true);

						$time_total = $time_end - $time_start;

						$this->db->trans_complete();
						echo json_encode(['proceso' => 'Correcto', 'mensaje' =>'Se actualizo un Total nombre'.count($this->Model_SeguimientoCertificado->meta($anio)).'Meta '.count($this->Model_SeguimientoCertificado->meta($anio)).'Gasto:'.count($this->Model_SeguimientoCertificado->gasto($anio)).' Tiempo '.($time_total + 4).' segundos\n']);exit;	
					}

				}catch (Exception $e) 
				{
					  $this->db->trans_rollback();
					  var_dump($e->getMessage());
				}
		}else
		{
			echo json_encode(['proceso' => 'error', 'mensaje' =>'No se encontro el año para su actualización']);exit;	
		}
	}
	else
	{
		echo json_encode(['proceso' => 'error', 'mensaje' =>'Codigo Incorrecto']);exit;	

	}
	
	}


}
