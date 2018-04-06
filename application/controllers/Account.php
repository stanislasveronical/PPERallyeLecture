<?php

/** @property CI_EnseignantModel $enseignantModel 
 *  @property Aauth $aauth 
 */

class Account extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
        $this->load->model('enseignantModel');
        $this->load->library('aauth');
        $this->load->library('form_validation');
    }
    
    public function verification ($idAauth, $keyVerif){
        
    }
    
    public function create(){
        LoadValidationRules($this->enseignantModel,$this->form_validation);
        
        $this->form_validation->set_rules('password','Password','required|max_length[100]');
        $this->form_validation->set_rules('passwordConfirmation','Confirmez le mot de passe','required|max_length[100]|callback_password_check');
        $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha_check');
        
        if($this->form_validation->run()){
            $params = array(
                $nom = $this->input->post['nom'],
                $prenom = $this->input->post['prenom'],
                $login = $this->input->post['login'],
                $password = $this->input->post['password']
            );
            
            $this->aauth->create_user($login,$password,$nom);
            $this->enseignantModel->add_Enseignant($params);
            $this->aauth->add_member(1, 'enseignant');
            $this->attente_confirmation($login);
        }
        else{
            $data['title']='Inscription au rallye lecture';
            $this->load->view('AppHeader',$data);
            $this->load->view('AccountCreate',$data);
            $this->load->view('AppFooter');
        }   
    }
    
    public function recaptcha_check($resp){
        if (empty($resp)){
            $this->form_validation->set_message('recaptcha_check',
                    'quelque chose me dit que vous êtes un robot. Voulez vous essayer à nouveau ?');
            return false;
        }
        else {
            return true;
        }
    }
    
    public function edit(){
        
    }
    
    public function password_check(){
        $password=$this->input->post('password');
        $passwordConfirmation=$this->input->post('passwordConfirmation');
        if($password!=$passwordConfirmation){
            $this->form_validation->set_message('password_check','le mot de passe de confirmation est différent du mot de passe initial');
            return false;
        }
        else {
            return true;
        }
    }
    
    public function attente_confirmation($email){
        $data['title']="Confirmation de votre inscription";
        $data['email']=$email;
        $this->load->view('AppHeader',$data);
        $this->load->view('AccountConfirmation',$data);
        $this->load->view('AppFooter');
    }
    
}