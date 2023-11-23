<?php
class Home extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function home()
    {
        $data['page_id'] = 1;
        $data['page_tag'] = "Home";
        $data['page_title'] = "Pagina principal";
        $data['page_name'] = "home";
        $data['page_content'] = "The display_errors and display_startup_errors are just two of the directives that are available. The display_errors directive will determine if the errors will be displayed or hidden from the user. Usually, the dispay_errors directive should be turned off after development.";
        $this->views->getView($this, "home", $data);
    }


    // public function insertar(){
    //     $data = $this->model->setUser("Carlos", 18);
    //     print_r($data);
    // }

    // public function verusuario($id){
    //     $data = $this->model->getUser($id);
    //     print_r($data);
    // }
    // public function verusuarios(){
    //     $data = $this->model->getUsers();
    //     print_r($data);
    // }

    // public function actualizar(){
    //     $data = $this->model->updateUser(1,"Roberto", 20);
    //     print_r($data);
    // }

    // public function eliminarUsuario($id){
    //     $data = $this->model->deleteUser($id);
    //     print_r($data);
    // }
}