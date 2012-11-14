<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

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
        $data['membre'] = $this->session->userdata('logged_in');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('M_Post');
        $data['posts']= $this->M_Post->lister();
        $data['title'] = "Ajouter un nouveau lien";

        foreach($data['posts'] as $post){
            if(!(fopen($post->image, 'r'))){
                $post->image = 'web/img/no-pre.png';
            }
        }

        $dataLayout['vue'] = $this->load->view('lister', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function ajouter()
    {
        $data['membre'] = $this->session->userdata('logged_in');
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
        $data['titre'] = $DomNodeList->item(0)->nodeValue;
        $data['title'] = 'Ajout d\'un lien '.$data['titre'];

        //Intégration du meta description
        $DomNodeList = $htmlDom->getElementsByTagName('meta');

        // Boucle sur les resultats du tag meta
        foreach($DomNodeList as $node){
            if(strtolower($node->getAttribute('name'))=='description'){
                $content = $node->getAttribute('content');
                if(isset($content)){
                    $data['description'] = $node->getAttribute('content');
                }else{
                   $data['description'] = 'Il n\'y a pas de déscription pour ce site';
                }
            }else{
                $data['description'] = 'Il n\'y a pas de déscription pour ce site';
            }
        }

        //Intégration image
        $DomNodeList = $htmlDom->getElementsByTagName('img');
        foreach($DomNodeList as $node){
            $src = $node->getAttribute('src');
            $src = $this->relAbs($lien, $src);

            //Affichage de l'extention
            $info = new SplFileInfo($src);

            //Affiche les images de format spécifique et affiche uniquement entre 100px et 800px
                  if($info->getExtension() == 'jpg' || $info->getExtension() == 'JPEG' || $info->getExtension() == 'png' || $info->getExtension() == 'gif'){
                      //Ne prendra pas en compte les images sans extentions
                      $size = getimagesize($src);
                      if($size[0] >= '150' && $size[0] <= '800'){
                          $data['images'][] = $src;
                      }
                  }
             }

        $data['id_membre'] = $this->input->post('id_membre');
        $data['url'] = $lien;

        //Intégration dans la vue de tous les éléments
        $dataLayout['vue'] = $this->load->view('ajouter', $data, true);
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
        if($this->input->is_ajax_request()){
            echo 'Lien supprimé';
        }else{
             redirect('error/error_ajax');
        }
    }

    //Voir le post pour le modifier
    public function voir()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Post');

        //Récupération de l'ID via l'url, la 3ème partie
        $id = $this->uri->segment(3);

        $post = $this->M_Post->voir($id);

        $data['titre'] = $post->titre;
        $data['title'] = 'Modifier le post: '.$data['titre'];
        $data['commentaire'] = $post->commentaire;
        $data['description'] = $post->description;
        $data['id_post'] = $post->id_post;

        $dataLayout['vue'] = $this->load->view('voir', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    //Modification du post
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

    //Correction des liens relatifs en absolus
    function relAbs ($url, $lien)
    {
        if ($lien){
            if (strstr($lien, 'http://') !== false || strstr($lien, 'https://') !== false){
                return $lien;
            }
        }else{
            return null;
        }

        if (!$url){
            return null;
        }

        if ($url[strlen($url)-1] !== '/'){
            $url .= '/';
        }

        if ($lien[0] == '/'){
            $lien = substr($lien, 1);
        }

        return $url.$lien;
    }
}
/* Location: ./application/controllers/post.php */