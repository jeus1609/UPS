<?php
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type, *");

defined('BASEPATH') or exit('No direct script access allowed');

class DatosGenerales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("DatosGenerales_Model");
    }

    public function importar($anio = null)
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $data['mensaje']    = 'Hubo un problema en la base de datos error x0012595'+$anio;
        $data['actualizo']  = false;

        try {

            $this->db->trans_start();
            $this->DatosGenerales_Model->delete_DatosGenerales($anio); //gasto

            $generica = $this->DatosGenerales_Model->generica($anio);
            $data['generica'] = 0;
            foreach ($generica as $row) {
                $ano_eje               = $row->ano_eje;
                $tipo_transaccion      = $row->tipo_transaccion;
                $generica              = $row->generica;
                $descripcion           = $row->descripcion;
                $id_grupo_clasificador = $row->id_grupo_clasificador;
                $ambito                = $row->ambito;
                $estado                = $row->estado;

                $this->DatosGenerales_Model->insert_generica($ano_eje, $tipo_transaccion, $generica, $descripcion, $id_grupo_clasificador, $ambito, $estado);
                $data['generica']++;
            }

            $subgenerica = $this->DatosGenerales_Model->subgenerica($anio);
            $data['subgenerica'] = 0;
            foreach ($subgenerica as $row) {
                $ano_eje          = $row->ano_eje;
                $tipo_transaccion = $row->tipo_transaccion;
                $generica         = $row->generica;
                $subgenerica      = $row->subgenerica;
                $descripcion      = $row->descripcion;
                $ambito           = $row->ambito;
                $estado           = $row->estado;

                $this->DatosGenerales_Model->insert_subgenerica($ano_eje, $tipo_transaccion, $generica, $subgenerica, $descripcion, $ambito, $estado);
                $data['subgenerica']++;
            }

            $subgenerica_det = $this->DatosGenerales_Model->subgenerica_det($anio);
            $data['subgenerica_det'] = 0;
            foreach ($subgenerica_det as $row) {

                $ano_eje           = $row->ano_eje;
                $tipo_transaccion  = $row->tipo_transaccion;
                $generica          = $row->generica;
                $subgenerica       = $row->subgenerica;
                $subgenerica_det   = $row->subgenerica_det;
                $descripcion       = $row->descripcion;
                $categoria_gasto   = $row->categoria_gasto;
                $tipo_act_proy     = $row->tipo_act_proy;
                $tipo_gasto        = $row->tipo_gasto;
                $ambito            = $row->ambito;
                $estado            = $row->estado;
                $categoria_ingreso = $row->categoria_ingreso;

                $this->DatosGenerales_Model->insert_subgenerica_det($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $descripcion, $categoria_gasto, $tipo_act_proy, $tipo_gasto, $ambito, $estado, $categoria_ingreso);
                $data['subgenerica_det']++;
            }

            $data['especifica'] = 0;
            $especifica = $this->DatosGenerales_Model->especifica($anio);
            foreach ($especifica as $row) {
                $ano_eje          = $row->ano_eje;
                $tipo_transaccion = $row->tipo_transaccion;
                $generica         = $row->generica;
                $subgenerica      = $row->subgenerica;
                $subgenerica_det  = $row->subgenerica_det;
                $especifica       = $row->especifica;
                $descripcion      = $row->descripcion;
                $ambito           = $row->ambito;
                $estado           = $row->estado;

                $this->DatosGenerales_Model->insert_especifica($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $especifica, $descripcion, $ambito, $estado);
                $data['especifica']++;
            }

            $especifica_det = $this->DatosGenerales_Model->especifica_det($anio);
            $data['especifica_det'] = 0;
            foreach ($especifica_det as $row) {

                $ano_eje          = $row->ano_eje;
                $tipo_transaccion = $row->tipo_transaccion;
                $generica         = $row->generica;
                $subgenerica      = $row->subgenerica;
                $subgenerica_det  = $row->subgenerica_det;
                $especifica       = $row->especifica;
                $especifica_det   = $row->especifica_det;
                $id_clasificador  = $row->id_clasificador;
                $descripcion      = $row->descripcion;
                $ambito           = $row->ambito;
                $estado           = $row->estado;
                $exclusivo_tp     = $row->exclusivo_tp;

                $this->DatosGenerales_Model->insert_especifica_det($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $especifica, $especifica_det, $id_clasificador, $descripcion, $ambito, $estado, $exclusivo_tp);
                $data['especifica_det']++;
            }

            $tipo_transaccion = $this->DatosGenerales_Model->tipo_transaccion($anio);
            $data['tipo_transaccion'] = 0;
            foreach ($tipo_transaccion as $row) {
                $ano_eje          = $row->ano_eje;
                $tipo_transaccion = $row->tipo_transaccion;
                $descripcion      = $row->descripcion;
                $estado           = $row->estado;

                $this->DatosGenerales_Model->insert_tipo_transaccion($ano_eje, $tipo_transaccion, $descripcion, $estado);
                $data['tipo_transaccion']++;
            }

            $fuente_financ = $this->DatosGenerales_Model->fuente_financ($anio);
            $data['fuente_financ'] = 0;
            foreach ($fuente_financ as $row) {
                $ano_eje                = $row->ano_eje;
                $origen                 = $row->origen;
                $fuente_financ          = $row->fuente_financ;
                $nombre                 = $row->nombre;
                $estado                 = $row->estado;
                $ambito                 = $row->ambito;
                $es_presupuestal        = $row->es_presupuestal;
                $es_modificable         = $row->es_modificable;
                $fuente_financ_agregada = $row->fuente_financ_agregada;
                $es_pptm                = $row->es_pptm;

                $this->DatosGenerales_Model->insert_fuente_financ($ano_eje, $origen, $fuente_financ, $nombre, $estado, $ambito, $es_presupuestal, $es_modificable, $fuente_financ_agregada, $es_pptm);
                $data['fuente_financ']++;
            }

            $finalidad          = $this->DatosGenerales_Model->finalidad($anio);
            $data['finalidad'] = 0;
            foreach ($finalidad as $row) {
                $ano_eje         = $row->ano_eje;
                $finalidad       = $row->finalidad;
                $nombre          = $row->nombre;
                $estado          = $row->estado;
                $ambito          = $row->ambito;
                $es_presupuestal = $row->es_presupuestal;
                $ambito_en       = $row->ambito_en;
                $ambito_programa = $row->ambito_programa;
                $es_generico     = $row->es_generico;
                //if($contador_finalidad==1)
                $this->DatosGenerales_Model->insert_finalidad($ano_eje, $finalidad, $nombre, $estado, $ambito, $es_presupuestal, $ambito_en, $ambito_programa, $es_generico);
                $data['finalidad']++;
            }

            $act_proy_nombre = $this->DatosGenerales_Model->act_proy_nombre($anio);
            $data['act_proy_nombre'] = 0;
            foreach ($act_proy_nombre as $row) {                
                $ano_eje = $row->ano_eje;
                $act_proy = $row->act_proy;
                $tipo_act_proy = $row->tipo_act_proy;
                $nombre = $row->nombre;
                $estado = $row->estado;
                $ambito = $row->ambito;
                $es_presupuestal = $row->es_presupuestal;
                $sector_snip = $row->sector_snip;
                $naturaleza_snip = $row->naturaleza_snip;
                $intervencion_snip = $row->intervencion_snip;
                $tipo_proyecto = $row->tipo_proyecto;
                $proyecto_snip = $row->proyecto_snip;
                $ambito_en = $row->ambito_en;
                $es_foniprel = $row->es_foniprel;
                $ambito_programa = $row->ambito_programa;
                $es_generico = $row->es_generico;
                $costo_actual = $row->costo_actual;
                $costo_expediente = $row->costo_expediente;
                $costo_viabilidad = $row->costo_viabilidad;
                $ejecucion_ano_anterior = $row->ejecucion_ano_anterior;
                $ind_viabilidad= $row->ind_viabilidad;

                $this->DatosGenerales_Model->insert_act_proy_nombre($ano_eje, $act_proy, $tipo_act_proy, $nombre, $estado, $ambito, $es_presupuestal, $sector_snip, $naturaleza_snip, $intervencion_snip, $tipo_proyecto, $proyecto_snip, $ambito_en, $es_foniprel, $ambito_programa, $es_generico, $costo_actual, $costo_expediente, $costo_viabilidad, $ejecucion_ano_anterior, $ind_viabilidad);
                $data['act_proy_nombre']++;
            }

            $this->db->trans_complete();

            $data['mensaje']            = 'Datos Generales del anio ' . $anio . ' fueron actualizados correctamente';
            $data['actualizo']          = true;

        } catch (Exception $e) {
            $this->db->trans_rollback();
            $data['mensaje'] = 'Proyectos no actualizados, ocurrio un error durante la actualizacion';
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }

}
