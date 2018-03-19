<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('loja_de_bebidas_m');
  }
  public function index(){
    $dados['bebidas'] = $this->loja_de_bebidas_m->getAll();
    $this->load->view('home', $dados);
  }

  public function cadastro(){
    $this->load->view('cadastro');
  }

  public function edita(){
    $this->load->view('edita');
  }

  public function deleta(){
    $this->load->view('deleta');
  }

  public function cadastrar_bebidas(){
    $post = $this->input->post();
    $this->loja_de_bebidas_m->cadastra_bebidas($post);
    $dados['bebidas'] = $this->loja_de_bebidas_m->getAll();
    redirect(base_url('home'));
  }

  public function selecionar_bebidas_editar($id = false){
   $dados['editar'] = $this->loja_de_bebidas_m->seleciona_bebidas($id);
   $this->load->view('edita', $dados);
  }

  public function selecionar_bebidas_deletar($id = false){
   $dados['deletar'] = $this->loja_de_bebidas_m->seleciona_bebidas($id);
   $this->load->view('deleta', $dados);
  }

  public function editar_bebidas(){
    $id = $this->input->post('id');
    $post = $this->input->post();
    $this->loja_de_bebidas_m->edita_bebidas($id, $post);
    $dados['bebidas'] = $this->loja_de_bebidas_m->getAll();
    redirect(base_url('home'));
  }

  public function deletar_bebidas(){
    $id = $this->input->post('id');
		//print $id; exit;
		$this->loja_de_bebidas_m->deleta_bebidas($id);
		redirect(base_url('home'));
  }
}
 ?>
