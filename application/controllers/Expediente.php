<?php
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type, *");

defined('BASEPATH') or exit('No direct script access allowed');

class Expediente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_Expediente");
        //$this->load->model(Model_Expediente::class);
    }

    public function estado_expediente($ano_eje, $expediente, $sec_ejec)
    {
        $long_exp = strlen($expediente);
        $cadena_ceros = '';
        for ($i=0; $i < (10-$long_exp); $i++) { 
            $cadena_ceros.='0';
        }

        $expediente =$cadena_ceros.$expediente;

        $data['expediente'] = $expediente;

        set_time_limit(0);
        ini_set('memory_limit', '-1');
        $data['mensaje']   = '';
        $data['actualizo'] = false;
        $nombre_proyecto   = '';

        //si existe exp -> CONTINUAR
        if (count($this->Model_Expediente->expediente($ano_eje, $expediente, $sec_ejec)) > 0) {
            try {
                $this->db->trans_start();

                $expediente_DATA = $this->Model_Expediente->expediente($ano_eje, $expediente, $sec_ejec);
                $this->Model_Expediente->del_expediente($ano_eje, $expediente, $sec_ejec);
                foreach ($expediente_DATA as $row) {
                    $ano_eje                   = $row->ano_eje;
                    $sec_ejec                  = $row->sec_ejec;
                    $expediente                = $row->expediente;
                    $mes_eje                   = $row->mes_eje;
                    $cod_doc                   = $row->cod_doc;
                    $num_doc                   = $row->num_doc;
                    $fecha_doc                 = $row->fecha_doc;
                    $fecha_ing                 = $row->fecha_ing;
                    $usuario_ing               = $row->usuario_ing;
                    $fecha_mod                 = $row->fecha_mod;
                    $usuario_mod               = $row->usuario_mod;
                    $tipo_operacion            = $row->tipo_operacion;
                    $sec_ejec2                 = $row->sec_ejec2;
                    $modalidad_compra          = $row->modalidad_compra;
                    $clase_menor_cuantia       = $row->clase_menor_cuantia;
                    $sec_area                  = $row->sec_area;
                    $flag_encargo              = $row->flag_encargo;
                    $expediente_encargante     = $row->expediente_encargante;
                    $cod_mensa                 = $row->cod_mensa;
                    $estado                    = $row->estado;
                    $estado_envio              = $row->estado_envio;
                    $archivo                   = $row->archivo;
                    $tipo_proceso              = $row->tipo_proceso;
                    $id_proceso                = $row->id_proceso;
                    $id_contrato               = $row->id_contrato;
                    $sec_ejec_contrato         = $row->sec_ejec_contrato;
                    $fase_contractual          = $row->fase_contractual;
                    $procedencia               = $row->procedencia;
                    $expediente_financiamiento = $row->expediente_financiamiento;

                    $this->Model_Expediente->ins_expediente($ano_eje, $sec_ejec, $expediente, $mes_eje, $cod_doc, $num_doc, $fecha_doc, $fecha_ing, $usuario_ing, $fecha_mod, $usuario_mod, $tipo_operacion, $sec_ejec2, $modalidad_compra, $clase_menor_cuantia, $sec_area, $flag_encargo, $expediente_encargante, $cod_mensa, $estado, $estado_envio, $archivo, $tipo_proceso, $id_proceso, $id_contrato, $sec_ejec_contrato, $fase_contractual, $procedencia, $expediente_financiamiento);
                }

                $expediente_nota_DATA = $this->Model_Expediente->expediente_nota($ano_eje, $expediente, $sec_ejec);
                $this->Model_Expediente->del_expediente_nota($ano_eje, $expediente, $sec_ejec);
                foreach ($expediente_nota_DATA as $row) {
                    $ano_eje        = $row->ano_eje;
                    $sec_ejec       = $row->sec_ejec;
                    $expediente     = $row->expediente;
                    $ciclo          = $row->ciclo;
                    $fase           = $row->fase;
                    $secuencia      = $row->secuencia;
                    $secuencia_nota = $row->secuencia_nota;
                    $notas          = $row->notas;
                    $estado         = $row->estado;
                    $estado_envio   = $row->estado_envio;
                    $archivo        = $row->archivo;

                    $this->Model_Expediente->ins_expediente_nota($ano_eje, $sec_ejec, $expediente, $ciclo, $fase, $secuencia, $secuencia_nota, $notas, $estado, $estado_envio, $archivo);
                }

                $expediente_fase_DATA = $this->Model_Expediente->expediente_fase($ano_eje, $expediente, $sec_ejec);
                $this->Model_Expediente->del_expediente_fase($ano_eje, $expediente, $sec_ejec);
                foreach ($expediente_fase_DATA as $row) {
                    $ano_eje                     = $row->ano_eje;
                    $sec_ejec                    = $row->sec_ejec;
                    $expediente                  = $row->expediente;
                    $ciclo                       = $row->ciclo;
                    $fase                        = $row->fase;
                    $secuencia                   = $row->secuencia;
                    $secuencia_padre             = $row->secuencia_padre;
                    $secuencia_anterior          = $row->secuencia_anterior;
                    $mes_ctb                     = $row->mes_ctb;
                    $monto_nacional              = $row->monto_nacional;
                    $monto_saldo                 = $row->monto_saldo;
                    $origen                      = $row->origen;
                    $fuente_financ               = $row->fuente_financ;
                    $mejor_fecha                 = $row->mejor_fecha;
                    $tipo_id                     = $row->tipo_id;
                    $ruc                         = $row->ruc;
                    $tipo_pago                   = $row->tipo_pago;
                    $tipo_recurso                = $row->tipo_recurso;
                    $tipo_compromiso             = $row->tipo_compromiso;
                    $organismo                   = $row->organismo;
                    $proyecto                    = $row->proyecto;
                    $estado                      = $row->estado;
                    $estado_envio                = $row->estado_envio;
                    $archivo                     = $row->archivo;
                    $tipo_giro                   = $row->tipo_giro;
                    $tipo_financiamiento         = $row->tipo_financiamiento;
                    $cod_doc_ref                 = $row->cod_doc_ref;
                    $fecha_doc_ref               = $row->fecha_doc_ref;
                    $num_doc_ref                 = $row->num_doc_ref;
                    $certificado                 = $row->certificado;
                    $certificado_secuencia       = $row->certificado_secuencia;
                    $sec_ejec_ruc                = $row->sec_ejec_ruc;
                    $sec_ejec_reciproca          = $row->sec_ejec_reciproca;
                    $transferencia_financiera_id = $row->transferencia_financiera_id;

                    $this->Model_Expediente->ins_expediente_fase($ano_eje, $sec_ejec, $expediente, $ciclo, $fase, $secuencia, $secuencia_padre, $secuencia_anterior, $mes_ctb, $monto_nacional, $monto_saldo, $origen, $fuente_financ, $mejor_fecha, $tipo_id, $ruc, $tipo_pago, $tipo_recurso, $tipo_compromiso, $organismo, $proyecto, $estado, $estado_envio, $archivo, $tipo_giro, $tipo_financiamiento, $cod_doc_ref, $fecha_doc_ref, $num_doc_ref, $certificado, $certificado_secuencia, $sec_ejec_ruc, $sec_ejec_reciproca, $transferencia_financiera_id);
                }

                
                $this->Model_Expediente->del_expediente_secuencia($ano_eje, $expediente, $sec_ejec);
                $expediente_secuencia_DATA = $this->Model_Expediente->expediente_secuencia($ano_eje, $expediente, $sec_ejec);
                foreach ($expediente_secuencia_DATA as $row) {
                    $ano_eje                   = $row->ano_eje;
                    $sec_ejec                  = $row->sec_ejec;
                    $expediente                = $row->expediente;
                    $ciclo                     = $row->ciclo;
                    $fase                      = $row->fase;
                    $secuencia                 = $row->secuencia;
                    $correlativo               = $row->correlativo;
                    $cod_doc                   = $row->cod_doc;
                    $num_doc                   = $row->num_doc;
                    $fecha_doc                 = $row->fecha_doc;
                    $moneda                    = $row->moneda;
                    $tipo_cambio               = $row->tipo_cambio;
                    $monto                     = $row->monto;
                    $monto_saldo               = $row->monto_saldo;
                    $monto_nacional            = $row->monto_nacional;
                    $monto_extranjero          = $row->monto_extranjero;
                    $fecha_ing                 = $row->fecha_ing;
                    $usuario_ing               = $row->usuario_ing;
                    $fecha_mod                 = $row->fecha_mod;
                    $usuario_mod               = $row->usuario_mod;
                    $num_record                = $row->num_record;
                    $serie_doc                 = $row->serie_doc;
                    $ano_proceso               = $row->ano_proceso;
                    $mes_proceso               = $row->mes_proceso;
                    $dia_proceso               = $row->dia_proceso;
                    $grupo                     = $row->grupo;
                    $edicion                   = $row->edicion;
                    $ano_cta_cte               = $row->ano_cta_cte;
                    $banco                     = $row->banco;
                    $cta_cte                   = $row->cta_cte;
                    $fecha_autorizacion        = $row->fecha_autorizacion;
                    $cod_mensa                 = $row->cod_mensa;
                    $estado_ctb                = $row->estado_ctb;
                    $estado_ctb_anterior       = $row->estado_ctb_anterior;
                    $estado                    = $row->estado;
                    $estado_anterior           = $row->estado_anterior;
                    $estado_envio              = $row->estado_envio;
                    $archivo                   = $row->archivo;
                    $reg_multiple              = $row->reg_multiple;
                    $cta_bco_ejec              = $row->cta_bco_ejec;
                    $flg_interfase             = $row->flg_interfase;
                    $ind_contabiliza           = $row->ind_contabiliza;
                    $tipo_cambio_ps            = $row->tipo_cambio_ps;
                    $sec_proceso               = $row->sec_proceso;
                    $cod_doc_b                 = $row->cod_doc_b;
                    $fecha_doc_b               = $row->fecha_doc_b;
                    $num_doc_b                 = $row->num_doc_b;
                    $fecha_bd_oracle           = $row->fecha_bd_oracle;
                    $mes_afectacion_calendario = $row->mes_afectacion_calendario;
                    $secuencia_solicitud       = $row->secuencia_solicitud;
                    $fecha_creacion_clt        = $row->fecha_creacion_clt;
                    $fecha_modificacion_clt    = $row->fecha_modificacion_clt;
                    $usuario_creacion_clt      = $row->usuario_creacion_clt;
                    $usuario_modificacion_clt  = $row->usuario_modificacion_clt;
                    $fecha_autorizacion_giro   = $row->fecha_autorizacion_giro;
                    $verifica_1                = $row->verifica_1;
                    $secuencia_transferencia   = $row->secuencia_transferencia;
                    $transferencia             = $row->transferencia;

                    $this->Model_Expediente->ins_expediente_secuencia($ano_eje, $sec_ejec, $expediente, $ciclo, $fase, $secuencia, $correlativo, $cod_doc, $num_doc, $fecha_doc, $moneda, $tipo_cambio, $monto, $monto_saldo, $monto_nacional, $monto_extranjero, $fecha_ing, $usuario_ing, $fecha_mod, $usuario_mod, $num_record, $serie_doc, $ano_proceso, $mes_proceso, $dia_proceso, $grupo, $edicion, $ano_cta_cte, $banco, $cta_cte, $fecha_autorizacion, $cod_mensa, $estado_ctb, $estado_ctb_anterior, $estado, $estado_anterior, $estado_envio, $archivo, $reg_multiple, $cta_bco_ejec, $flg_interfase, $ind_contabiliza, $tipo_cambio_ps, $sec_proceso, $cod_doc_b, $fecha_doc_b, $num_doc_b, $fecha_bd_oracle, $mes_afectacion_calendario, $secuencia_solicitud, $fecha_creacion_clt, $fecha_modificacion_clt, $usuario_creacion_clt, $usuario_modificacion_clt, $fecha_autorizacion_giro, $verifica_1, $secuencia_transferencia, $transferencia);
                }

                $tipo_operacion_DATA = $this->Model_Expediente->tipo_operacion($ano_eje);
                $this->Model_Expediente->del_tipo_operacion($ano_eje);
                foreach ($tipo_operacion_DATA as $row) {
                    $ano_eje                 = $row->ano_eje;
                    $tipo_operacion          = $row->tipo_operacion;
                    $nombre                  = $row->nombre;
                    $ambito                  = $row->ambito;
                    $descripcion_abreviada   = $row->descripcion_abreviada;
                    $fecha_generacion        = $row->fecha_generacion;
                    $estado                  = $row->estado;
                    $ciclo                   = $row->ciclo;
                    $es_compromiso_anual     = $row->es_compromiso_anual;
                    $es_ft                   = $row->es_ft;
                    $es_sunat                = $row->es_sunat;
                    $es_reciproca            = $row->es_reciproca;
                    $es_reciproca_compromiso = $row->es_reciproca_compromiso;

                    $this->Model_Expediente->ins_tipo_operacion($ano_eje, $tipo_operacion, $nombre, $ambito, $descripcion_abreviada, $fecha_generacion, $estado, $ciclo, $es_compromiso_anual, $es_ft, $es_sunat, $es_reciproca, $es_reciproca_compromiso);
                }

                //FINALIZO CORRECTAMENTE
                $this->db->trans_complete();
                $data['mensaje']   = 'Expediente ' . $expediente . ' del anio ' . $ano_eje . ' fue actualizado correctamente';
                $data['actualizo'] = true;

            } catch (Exception $e) {
                $this->db->trans_rollback();
                $data['mensaje'] = 'ERROR, Proyecto ' . $CodigoUnico . ' no pudo ser Actualizado, ocurrio un error durante la actualizacion';
            }

        } else {
            $data['mensaje'] = 'ERROR, Expediente no existe';
        }
        echo json_encode($data, JSON_FORCE_OBJECT);
    }
}
