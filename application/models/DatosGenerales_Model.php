<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class DatosGenerales_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function generica($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM generica WHERE ano_eje = '$anio'");
        return $data->result();
    }

    public function subgenerica($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM subgenerica WHERE ano_eje = '$anio'");
        return $data->result();
    }

    public function subgenerica_det($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM subgenerica_det WHERE ano_eje = '$anio'");
        return $data->result();
    }

    public function especifica($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM especifica WHERE ano_eje = '$anio'");
        return $data->result();
    }

    public function especifica_det($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM especifica_det WHERE ano_eje = '$anio'");
        return $data->result();
    }

    public function tipo_transaccion($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM tipo_transaccion WHERE ano_eje = '$anio'");
        return $data->result();
    }

    public function fuente_financ($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM fuente_financ WHERE ano_eje = '$anio'");
        return $data->result();
    }

    public function finalidad($anio)
    {
        $db_prueba = $this->load->database('SIAF', true);
        $data      = $db_prueba->query("select *	FROM finalidad WHERE ano_eje = '$anio'");
        return $data->result();
    }

    //INSERTS
 
    public function insert_generica($ano_eje, $tipo_transaccion, $generica, $descripcion, $id_grupo_clasificador, $ambito, $estado)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("INSERT INTO [dbo].[generica]
           ([ano_eje], [tipo_transaccion], [generica], [descripcion], [id_grupo_clasificador], [ambito], [estado])
		     VALUES
		           (
		           '$ano_eje', '$tipo_transaccion', '$generica', '$descripcion', '$id_grupo_clasificador', '$ambito', '$estado'
		           )");
        return true;
    }

    public function insert_subgenerica($ano_eje, $tipo_transaccion, $generica, $subgenerica, $descripcion, $ambito, $estado)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("INSERT INTO [dbo].[subgenerica]
           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [descripcion], [ambito], [estado])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$descripcion', '$ambito', '$estado')");
        return true;
    }

    public function insert_subgenerica_det($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $descripcion, $categoria_gasto, $tipo_act_proy, $tipo_gasto, $ambito, $estado, $categoria_ingreso)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("INSERT INTO [dbo].[subgenerica_det]
           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [subgenerica_det], [descripcion], [categoria_gasto], [tipo_act_proy], [tipo_gasto], [ambito], [estado], [categoria_ingreso])
			     VALUES
			           (
			           '$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$subgenerica_det', '$descripcion', '$categoria_gasto', '$tipo_act_proy', '$tipo_gasto', '$ambito', '$estado', '$categoria_ingreso'
			           )");
        return true;
    }

    public function insert_especifica($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $especifica, $descripcion, $ambito, $estado)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("INSERT INTO [dbo].[especifica]
		           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [subgenerica_det], [especifica], [descripcion], [ambito], [estado])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$subgenerica_det', '$especifica', '$descripcion', '$ambito', '$estado')");
        return true;
    }

    public function insert_especifica_det($ano_eje, $tipo_transaccion, $generica, $subgenerica, $subgenerica_det, $especifica, $especifica_det, $id_clasificador, $descripcion, $ambito, $estado, $exclusivo_tp)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("INSERT INTO [dbo].[especifica_det]
		           ([ano_eje], [tipo_transaccion], [generica], [subgenerica], [subgenerica_det], [especifica], [especifica_det], [id_clasificador], [descripcion], [ambito], [estado], [exclusivo_tp])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$generica', '$subgenerica', '$subgenerica_det', '$especifica', '$especifica_det', '$id_clasificador', '$descripcion', '$ambito', '$estado', '$exclusivo_tp')");
        return true;
    }

    public function insert_tipo_transaccion($ano_eje, $tipo_transaccion, $descripcion, $estado)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("INSERT INTO [dbo].[tipo_transaccion]
		           ([ano_eje], [tipo_transaccion], [descripcion], [estado])
		     VALUES
		           ('$ano_eje', '$tipo_transaccion', '$descripcion', '$estado')");
        return true;
    }

    public function insert_fuente_financ($ano_eje, $origen, $fuente_financ, $nombre, $estado, $ambito, $es_presupuestal, $es_modificable, $fuente_financ_agregada, $es_pptm)
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("INSERT INTO [dbo].[fuente_financ]
	           ([ano_eje], [origen], [fuente_financ], [nombre], [estado], [ambito], [es_presupuestal], [es_modificable], [fuente_financ_agregada], [es_pptm])
	     VALUES
	           ('$ano_eje', '$origen', '$fuente_financ', '$nombre', '$estado', '$ambito', '$es_presupuestal', '$es_modificable', '$fuente_financ_agregada', '$es_pptm' )");
        return true;
    }

    public function insert_finalidad($ano_eje, $finalidad, $nombre, $estado, $ambito, $es_presupuestal, $ambito_en, $ambito_programa, $es_generico)
    {
    	$caracteres_prohibidos = array("'","/","<",">",";");    
        $nuevo_nombre = str_replace($caracteres_prohibidos," ",$nombre);

        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("insert into [dbo].[finalidad]
	   	         ([ano_eje], [finalidad], [nombre], [estado], [ambito], [es_presupuestal], [ambito_en], [ambito_programa], [es_generico])
		     VALUES
		           ('$ano_eje', '$finalidad', '$nuevo_nombre', '$estado', '$ambito', '$es_presupuestal', '$ambito_en', '$ambito_programa', '$es_generico')");
        return true;
    }

    public function delete_DatosGenerales($anio) //Delete
    {
        $db_prueba = $this->load->database('DBSIAF', true);
        $data      = $db_prueba->query("
				DECLARE @anio varchar(50)='$anio'
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
				COMMIT TRAN T1");
        return true;
    }
}
