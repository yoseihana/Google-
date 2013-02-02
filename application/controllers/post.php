<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller
{

    public function __construct()
    {
       parent::__construct();

        if (!($this->session->userdata('logged_in')))
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
        $data['title'] = "Ajouter un nouveau lien";

        $this->load->library('pagination');

        $config = array();
        $config['base_url'] = 'http://sharelink.buffart.eu/index.php/post/lister/';
        $config['total_rows'] = $this->M_Post->countPost();
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $data['posts'] = $this->M_Post->lister($config['per_page'], $this->uri->segment($config["uri_segment"]));
        $data['links'] = $this->pagination->create_links();

        foreach ($data['posts'] as $post)
        {
            if (empty($post->image))
            {
                $post->image = null;
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

        //Vérifie si le lien existe déjà
        if($this->M_Post->isPostExist($lien))
        {
            redirect('error/error_post_exist');
            return false;
        }

        //Si $lien ne fini pas par /
        if(!preg_match('/^[^ ]+\/$/i', $lien)){
            $lien = $lien.'/';
        }

        //Recherche l'occurence .html dans $liens
        if (strpbrk($lien, '.html'))
        {


            //Recherche la position dans $lien de "/"
            $newL = strrpos($lien, "/");
            //Retourne la chaine $lien commencant à l'occurence 0 et à length = $newL
            $url = substr($lien, 0, $newL);
        }


        //Appel la fct via l'objet m_post
        $html = $this->file_get_contents_curl($lien);
        $htmlDom = new DOMDocument();

        //@ = cache les erreurs du HTML
        @$htmlDom->loadHTML($html);

        //intégartion du title
        $DomNodeList = $htmlDom->getElementsByTagName('title');
        //$data['titre'] = $DomNodeList->item(0)->nodeValue;
        $data['titre']= utf8_encode($DomNodeList->item(0)->nodeValue);
        $data['title'] = 'Ajout d\'un lien ' . $data['titre'];

        //Intégration du meta description
        $DomNodeList = $htmlDom->getElementsByTagName('meta');

        //Boucle sur les ittérations de <meta>
        $descriptionNode = null;
        foreach ($DomNodeList as $node)
        {
            if (strtolower($node->getAttribute('name')) == 'description')
            {
                $descriptionNode = $node;
                break;
            }
        }

        //Assigniation de la description si $descriptionNode trouvé
        if (is_null($descriptionNode))
        {
            $data['description'] = 'Il n\' a pas de description pour ce site';
        } else
        {
           // $data['description'] = $descriptionNode->getAttribute('content');
            $data['description'] = utf8_encode($descriptionNode->getAttribute('content'));
        }


        //Intégration image
        $DomNodeList = $htmlDom->getElementsByTagName('img');

        foreach ($DomNodeList as $node)
        {
            $src = $node->getAttribute('src');

            $src = $this->relAbs($url, $src);
            $header = get_headers($src);

            if (stripos($header[0], '404 Not Found') == false)
            {

                //Affichage de l'extention
                $info = new SplFileInfo($src);

                //Affiche les images de format spécifique et affiche uniquement entre 100px et 800px
                if ($info->getExtension() == 'jpg' || $info->getExtension() == 'JPEG' || $info->getExtension() == 'png' || $info->getExtension() == 'gif' || $info->getExtension() == 'JPG')
                {
                    $size = getimagesize($src);

                    if ($size[0] >= '50' && $size[0] <= '900')
                    {
                        $data['images'][] = $src;
                    }
                }
            } else
            {

                $data['image'][] = 'web/img/no-pre.png';
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

        //Reprise des données dans le formulaire
        $data['commentaire'] = $this->input->post('commentaire');
        $data['titre'] = $this->input->post('titre');
        $data['description'] = $this->input->post('description');

        $data['image'] = $this->input->post('image');
        $data['id_membre'] = $this->input->post('membre');
        //$data['id_membre'] = '1';
        $data['lien'] = $this->input->post('lien');

        $this->M_Post->creer($data);
        redirect('post/lister');
    }

    //Pour éviter d'afficher dans l'url
    private function file_get_contents_curl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); # required for https urls
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        //Gestion de l'erreur si l'URL donnée n'est pas bonne
        if (!preg_match('#HTTP/1.1.200#', $data))
        {
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
        if ($this->input->is_ajax_request())
        {
            echo 'Lien supprimé';
        } else
        {
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
        $data['title'] = 'Modifier le post: ' . $data['titre'];
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
    private function relAbs($url, $lien)
    {
        if ($lien)
        {
            if (strstr($lien, 'http://') !== false || strstr($lien, 'https://') !== false)
            {
                return $lien;
            }
        } else
        {
            return null;
        }

        if (!$url)
        {
            return null;
        }

        if ($url[strlen($url) - 1] !== '/')
        {
            $url .= '/';
        }

        if ($lien[0] == '/')
        {
            $lien = substr($lien, 1);
        }

        return $url . $lien;
    }
}
/* Location: ./application/controllers/post.php */