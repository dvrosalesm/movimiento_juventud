<?php

class Insertar extends CI_Model {


function exists_establecimiento($id)
{
	// Evalua si existe o no el registro con ese numero de id, regresa un valor True o False
	$this->db->from('Establecimiento');
	$this->db->where('idEstablecimiento',$id);
	$query = $this->db->get();
	
	return ($query->num_rows()>=1);
}


function newEstablecimiento($data)
{
// query select from where
	$this->db->from('Establecimiento');
	$this->db->where('nombre_establecimiento',$data['nombre_establecimiento']);
	$query = $this->db->get();
// si existe algun registro asi
	if ($query->num_rows()==1)
	{
// obtener el id del registro existente
		$row = $query->row();
		$idEstablecimiento = $row->idEstablecimiento;
	}
	else{
// si no id null
		$idEstablecimiento = '';
	}

// Si NO existe
	if (!$this->exists_establecimiento($idEstablecimiento))
	{
// inserta el dato y devuelve el id
		$this->db->insert('Establecimiento', $data); 
		return $this->db->insert_id();
	}
	else
	{
//Si ya existe que actualize los datos y siempre regresa el id 
		$this->db->where('idEstablecimiento',$idEstablecimiento);
		$this->db->update('Establecimiento',$data);
		return $idEstablecimiento;
	}


}

function exists_participante($id)
{

	$this->db->from('Participante');
	$this->db->where('idParticipante',$id);
	$query = $this->db->get();

	return ($query->num_rows()>=1);
}

 function newParticipante($data)
{
// query select from where
	$this->db->where('primer_nombre',$data['primer_nombre']);
	$this->db->where('segundo_nombre',$data['segundo_nombre']);
	$this->db->where('primer_apellido',$data['primer_apellido']);
	$this->db->where('segundo_apellido',$data['segundo_apellido']);
	$this->db->where('fecha_nacimiento',$data['fecha_nacimiento']);
	$this->db->from('Participante');
	$query = $this->db->get();
// si existe algun registro asi
	if ($query->num_rows()>=1)
	{
// obtener el id del registro existente
		$row = $query->row();
		$idParticipante = $row->idParticipante;
	}
	else{
// si no id null
		$idParticipante = '';
	}
// Si NO existe
	if (!$this->exists_participante($idParticipante))
	{
// inserta el dato y devuelve el id		
	$this->db->insert('Participante', $data); 
	return $this->db->insert_id();
	}
	else
	{
//Si ya existe que actualize los datos y siempre regresa el id 	
		$this->db->where('idParticipante',$idParticipante);
		$this->db->update('Participante',$data);	
		return $idParticipante;
	}
}
function exists_asig_P_E($id)
{
	$this->db->from('Asignar_Establecimiento');
	$this->db->where('idAsignar_Establecimiento',$id);
	$query = $this->db->get();

	return ($query->num_rows()>=1);
}

function newAsignacion_P_E($data)
{
	$this->db->where('id_participante',$data['id_participante']);
	$this->db->where('id_establecimiento',$data['id_establecimiento']);
	$this->db->from('Asignar_Establecimiento');
	$query = $this->db->get();

	if ($query->num_rows()>=1) {
		$row= $query->row();
		$idAsignar_Establecimiento = $row->$idAsignar_Establecimiento;
	}else{
		$idAsignar_Establecimiento = '';
	}
	if (!$this->exists_asig_P_E($idAsignar_Establecimiento)) {
		$this->db->insert('Asignar_Establecimiento',$data);
		return $this->db->insert_id();
	}else{
		return $idAsignar_Establecimiento;
	}
}

function newAsignacion_Individual($data)
{
	// No esta terminado
}




}
?>