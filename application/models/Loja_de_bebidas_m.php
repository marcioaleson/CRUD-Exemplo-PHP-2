<?php
class Loja_de_bebidas_m extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function getAll(){
    $query = $this->db->get('loja_de_bebidas');
    return ($query->num_rows()>0) ? $query->result(): false;
  }

  public function seleciona_bebidas($id = false){
   $this->db->where('id', $id);
   return $this->getAll();
  }

  public function cadastra_bebidas($data){
    $this->db->insert('loja_de_bebidas', $data);
  }

  public function edita_bebidas($id, $data){
    $this->db->where('id', $id);
    $this->db->update('loja_de_bebidas', $data);
  }

  public function deleta_bebidas($id = false){
    $this->db->where('id', $id);
    return $this->db->delete('loja_de_bebidas');
  }
}
 ?>
