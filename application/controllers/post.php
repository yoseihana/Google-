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

	}

    public function ajouter()
    {
        $this->load->helper('form');
        $dataList['title'] = "Ajouter un lien";


        $dataLayout['vue'] = $this->load->view('ajouter', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    public function lister()
    {
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
        $DomNodeList = $htmlDom->getElementsByTagName("meta");

        // Boucle sur les resultats du tag meta
        foreach($DomNodeList as $node){
            if(strtolower($node->getAttribute('name'))=='description'){
                $dataList['description'] = $node->getAttribute('content');
            }
        }

        //Intégration des img
        $DomNodeList = $html->getElementsByTagName('img');


        //Intégration dans la vue de tous les éléments
        $dataLayout['vue'] = $this->load->view('lister', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    //Fonction pour ajouter dans la BD
    public function créer()
    {
       /* //Chargement des post
        // $this->load->model('M_Post');
        // $dataList['posts']= $this->M_Post->lister();

        //Chargement livbraire pour form et validation form
        $this->load->helpers(array('form', 'url'));
        $this->load->library('form_validation');

        $data['title'] = "Ajouter un lien";

        //Validation des éléments dans les champs
        $this->form_validation->set_rules('pseudo', 'Pseudo', 'Obligatoire');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'Obligatoire');
        $this->form_validation->set_rules('lien', 'Lien', 'Obligatoire');

        //Si les champs contiennent qqch
        if($this->form_validation->run() == FALSE)
        {
            var_dump('Not ok');
        }
        else
        {
            //Affichage de la liste + ajout
            //$this->M_Post->ajouter();
            //$dataLayout['vue'] = $this->load->view('lister', $dataList, true);
            //$this->load->view('layout', $dataLayout);
            var_dump('OK');
        }*/
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */