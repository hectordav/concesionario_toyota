<?php
class Usuario_model extends CI_Model{

    public function get_todos_usuarios(){
      $usuario=$this->db->get('t_usuario');
       if($usuario->num_rows()> 0){
            return $usuario->result();
        }
    }
    public function get_usuario_id($id_usuario){
      $this->db->where('id', $id_usuario);
      $consulta=$this->db->get('t_usuario',1);
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    public function actualizar_estado_usuario($id_usuario,$id_estado){
      $data = array('id_estado_usuario' =>$id_estado);
      $this->db->where('id', $id_usuario);
      $this->db->update('t_usuario', $data);
    }
    public function get_estado(){
      $consulta=$this->db->get('t_estado_usuario');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    public function get_usuario_id_nivel($id_nivel){
      $this->db->where('id_nivel', $id_nivel);
      $consulta=$this->db->get('t_usuario');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }

   public function guardar_usuario($id_nivel,$estado_usuario,$nombre,$login,$clave){
     $data = array('id_nivel' =>$id_nivel,
     'id_estado_usuario'=>$estado_usuario,
     'nombre'=>$nombre,
     'login'=>$login,
     'clave'=>$clave);
     $this->db->insert('t_usuario', $data);

   }
    public function actualizar_usuario($id_usuario,$id_nivel,$estado_usuario,$nombre,$login,$clave){
     $data = array('id_nivel' =>$id_nivel,
     'id_estado_usuario'=>$estado_usuario,
     'nombre'=>$nombre,
     'login'=>$login,
     'clave'=>$clave);
     $this->db->where('id', $id_usuario);
     $this->db->update('t_usuario', $data);
     
   }
}