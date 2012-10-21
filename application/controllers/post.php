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
        $this->lister();

	}

    public function lister()
    {
        $this->load->model('M_Post');
        $dataList['posts']= $this->M_Post->lister();

     for($i = 0; $i<count($dataList['posts']); $i++)
     {
        $data = $dataList['posts'][$i];

         //foreach($dataList['posts'][$i] as $data){
            $url = $data->url;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $html = curl_exec($curl);
            curl_close($curl);

            $htmlDom = new DOMDocument();
            $htmlDom->loadHTML($html);

            $DomNodeList = null;
            $DomNodeList = $htmlDom->getElementsByTagName('title');
            //$DomNodeList = $htmlDom->getElementsByTagName('meta');

            $dataList['title'] = $DomNodeList->item(0);

         //var_dump($htmlDom->attributes->length);

         // Meta DomNodeList
         $DomNodeList = $htmlDom->getElementsByTagName("meta");

         // Boucle sur les resultats du tag meta
         for ($iMeta = 0; $iMeta < $DomNodeList->length; $iMeta++) {
             // Meta DomNode attributes map
             $iMetaAttrMap = $DomNodeList->item($iMeta)->attributes;

             // Si le tag meta a un attr name qui vaut 'description'
             if (strtolower($iMetaAttrMap->getNamedItem('name')->nodeValue) == 'description') {
                 // On récupère la valeur de l'attribut content
                 var_dump($iMetaAttrMap->getNamedItem('content')->nodeValue);
             }
             $iMeta++;
         }

            $dataList['title'] = $dataList['title']->nodeValue;
            $dataList['meta'] = $dataList['meta']->nodeValue;

         $i++;
        }

        $dataLayout['vue'] = $this->load->view('lister', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    public function ajouter()
    {
        //Chargement des post
        $this->load->model('M_Post');
        $dataList['posts']= $this->M_Post->lister();

        //Chargement livbraire pour form et validation form
        $this->load->helpers('form');
        $this->load->library('form_validation');

        $data['title'] = "Ajouter un lien";

        //Validation des éléments dans les champs
        $this->form_validation->set_rules('pseudo', 'Pseudo', 'Obligatoire');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'Obligatoire');
        $this->form_validation->set_rules('lien', 'Lien', 'Obligatoire');

        //Si les champs contiennent qqch
        if($this->form_validation->run() === FALSE)
        {
            var_dump('Not ok');
        }
        else
        {
            //Affichage de la liste + ajout
            $this->M_Post->ajouter();
            $dataLayout['vue'] = $this->load->view('lister', $dataList, true);
            $this->load->view('layout', $dataLayout);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */