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
        $data['cant_gasto'] = 0;

        try {

            $this->db->trans_start();
            $this->DatosGenerales_Model->delete_DatosGenerales($anio); //gasto

            $generica = $this->DatosGenerales_Model->generica($anio);
            foreach ($generica as $row) {
                $ano_eje               = $row->ano_eje;
                $tipo_transaccion      = $row->tipo_transaccion;
                $generica              = $row->generica;
                $descripcion           = $row->descripcion;
                $id_grupo_clasificador = $row->id_grupo_clasificador;
                $ambito                = $row->ambito;
                $estado                = $row->estado;

                $this->DatosGenerales_Model->insert_generica($ano_eje, $tipo_transaccion, $generica, $descripcion, $id_grupo_clasificador, $ambito, $estado);
            }

            $subgenerica = $this->DatosGenerales_Model->subgenerica($anio);
            foreach ($subgenerica as $row) {
                $ano_eje          = $row->ano_eje;
                $tipo_transaccion = $row->tipo_transaccion;
                $generica         = $row->generica;
                $subgenerica      = $row->subgenerica;
                $descripcion      = $row->descripcion;
                $ambito           = $row->ambito;
                $estado           = $row->estado;

                $this->DatosGenerales_Model->insert_subgenerica($ano_eje, $tipo_transaccion, $generica, $subgenerica, $descripcion, $ambito, $estado);
            }

            $subgenerica_det = $this->DatosGenerales_Model->subgenerica_det($anio);
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
            }

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
            }

            $especifica_det = $this->DatosGenerales_Model->especifica_det($anio);
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
            }

            $tipo_transaccion = $this->DatosGenerales_Model->tipo_transaccion($anio);
            foreach ($tipo_transaccion as $row) {
                $ano_eje          = $row->ano_eje;
                $tipo_transaccion = $row->tipo_transaccion;
                $descripcion      = $row->descripcion;
                $estado           = $row->estado;

                $this->DatosGenerales_Model->insert_tipo_transaccion($ano_eje, $tipo_transaccion, $descripcion, $estado);
            }

            $fuente_financ = $this->DatosGenerales_Model->fuente_financ($anio);
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
            }

            $finalidad          = $this->DatosGenerales_Model->finalidad($anio);
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
            }

            $this->db->trans_complete();

            $data['mensaje']            = 'Datos Generales del año ' . $anio . ' fueron actualizados correctamente';
            $data['actualizo']          = true;

        } catch (Exception $e) {
            $this->db->trans_rollback();
            $data['mensaje'] = 'Proyectos no actualizados, ocurrio un error durante la actualizacion';
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }

}
