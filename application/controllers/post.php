<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        $this->ajouter();
        //$this->load->library('image_lib');

	}

    public function ajouter()
    {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('M_Post');
        $dataList['posts']= $this->M_Post->lister();
        $dataList['title'] = "Ajouter un lien";


        $dataLayout['vue'] = $this->load->view('ajouter', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    public function lister()
    {
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->model('M_Post');
        $dataList['posts']= $this->M_Post->lister();

        $lien = $this->input->post('lien');

        //Appel la fct via l'objet m_post
        $html = $this->file_get_contents_curl($lien);

        $htmlDom = new DOMDocument();

        //@ = cache les erreurs du HTML
        @$htmlDom->loadHTML($html);

        //intégartion du title
        $DomNodeList = $htmlDom->getElementsByTagName('title');
        $dataList['titre'] = $DomNodeList->item(0)->nodeValue;

        //Intégration du meta description
        $DomNodeList = $htmlDom->getElementsByTagName('meta');

        // Boucle sur les resultats du tag meta
        foreach($DomNodeList as $node){
            if(strtolower($node->getAttribute('name'))=='description'){
                $dataList['description'] = $node->getAttribute('content');
            }
        }

        //Intégration image
        $DomNodeList = $htmlDom->getElementsByTagName('img');
        foreach($DomNodeList as $node){
            $dataList['images'][] = $node->getAttribute('src');

        }

        $dataList['pseudo'] = $this->input->post('pseudo');
        $dataList['commentaire'] = $this->input->post('commentaire');
        $dataList['url'] = $lien;

        //Intégration dans la vue de tous les éléments
        $dataLayout['vue'] = $this->load->view('lister', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    //Fonction pour ajouter dans la BD
    public function creer()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        /*$data['title'] = 'Create a news item';

        $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'required');
        $this->form_validation->set_rules('lien', 'Lien', 'required');
        $this->form_validation->set_rules('titre', 'Titre', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        var_dump($this->form_validation->set_rules('image', 'Image', 'required'));
        return;
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }*/

        $data['lien'] = $this->input->post('lien');
        $data['commentaire'] = $this->input->post('commentaire');
        $data['titre']=$this->input->post('titre');
        $data['desciption']=$this->input->post('description');
        $data['image']=$this->input->post('image');
        $daat['id_membre']=$this->input->post('pseudo');

        $this->M_Post->creer($data);
        redirect('sucess.php');
    }

    //Pour éviter d'afficher dans l'url
    private function file_get_contents_curl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    //Supprimer un lien
    function delete($it)
    {
        // $this->M_Post->delet($it);

        //Si l'appel de cette fct a été faite avec ajax ou pas
        if($this->input->is_ajax_request())
        {
            echo 'Lien supprimé';
        }
        else
        {
            /*$data['vue'] = 'ok';
            $this->load->view*/
            //$this->load->view('ok');
            echo "Pas d'ajax";
           // redirect('post/ajouter');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */