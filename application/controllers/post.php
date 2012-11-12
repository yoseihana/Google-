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

        if(!($this->session->userdata('logged_in')))
        {
            redirect('membre');
        }
    }

    public function index()
	{
        $this->lister();

	}

    public function lister()
    {
        $dataList['membre'] = $this->session->userdata('logged_in');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('M_Post');
        $dataList['posts']= $this->M_Post->lister();
        $dataList['title'] = "Ajouter un lien";


        $dataLayout['vue'] = $this->load->view('lister', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    public function ajouter()
    {
        $dataList['membre'] = $this->session->userdata('logged_in');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->model('M_Post');
        $this->load->library('image_lib');
        $this->load->helper('url');

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

                $content = $node->getAttribute('content');
                if(isset($content)){
                    $dataList['description'] = $node->getAttribute('content');
                }else{
                   $dataLayout['description'] = 'Il n\'y a pas de déscription pour ce site';
                }
            }else{
                $dataLayout['description'] = 'Il n\'y a pas de déscription pour ce site';
            }
        }

        //Intégration image
        $DomNodeList = $htmlDom->getElementsByTagName('img');
        foreach($DomNodeList as $node){

            $src = $node->getAttribute('src');

            //Affichage de l'extention
            $info = new SplFileInfo($src);

            //N'affiche pas les gif et affiche uniquement entre 100px et 800px
             if(preg_match('/http/', $src)){
                  if($info->getExtension() == 'jpg' || $info->getExtension() == 'JPEG' || $info->getExtension() == 'png'){
                      $size = getimagesize($src);
                      if($size[0] >= '150' && $size[0] <= '800'){
                          $dataList['images'][] = $src;
                      }
                  }
             }
        }

        $dataList['id_membre'] = $this->input->post('id_membre');
        $dataList['url'] = $lien;

        //Intégration dans la vue de tous les éléments
        $dataLayout['vue'] = $this->load->view('ajouter', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    //Fonction pour ajouter dans la BD
    public function creer()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Post');
        $this->load->library('upload');
        $this->load->library('image_lib');

        $posts= $this->M_Post->lister();
        $nbPosts = count($posts);

        //Reprise des données dans le formulaire
        $data['lien'] = $this->input->post('lien');
        $data['commentaire'] = $this->input->post('commentaire');
        $data['titre']=$this->input->post('titre');
        $data['description']=$this->input->post('description');
        $data['image']=$this->input->post('image');
        $data['id_membre']=$this->input->post('membre');
        $data['url'] = $this->input->post('url');

        $content = file_get_contents($data['image']);
        $titreImage = strtolower(str_replace(' ', '', $data['titre']));
        for($image = 0; $image<$nbPosts; ++$image){

            file_put_contents('./web/uploads/'.$titreImage.$image.'.jpg', $content);
            $image++;
        }

        //TODO resize Image (pas en CSS)

        $this->M_Post->creer($data);
        redirect('post/lister');
    }

    //Pour éviter d'afficher dans l'url
    private function file_get_contents_curl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        //Gestion de l'erreur si l'URL donnée n'est pas bonne
        if(!preg_match('#HTTP/1.1.200#', $data)){
            redirect('error/error_lien');
        }

        return $data;
    }

    //Supprimer un lien
    public function delete($it)
    {
        $this->load->model('M_Post');
        $this->M_Post->delete($it);

        //Si l'appel de cette fct a été faite avec ajax ou pas
        if($this->input->is_ajax_request())
        {
            echo 'Lien supprimé';

        }
        else
        {
             redirect('error/error_ajax');
        }
    }

    public function voir()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Post');

        $id = $this->uri->segment(3);

        $data['post']= $this->M_Post->voir($id);

        $dataLayout['vue'] = $this->load->view('voir', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function modifier()
    {
        $this->load->helper('form');
        $this->load->model('M_Post');

        $id = $this->input->post('id_post');

        $data['commentaire'] = $this->input->post('commentaire');
        $data['description'] = $this->input->post('description');

        $this->M_Post->modifier($data, $id);
        redirect('post/lister');


    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */