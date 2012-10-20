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
        $dataList['posts'][0] = $this->M_Post->lister();

        foreach($dataList['posts'][0] as $data){
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

            $dataList['html'] = $DomNodeList->item(0);

            $dataList['html'] = $dataList['html']->nodeValue;

        }

        $dataLayout['vue'] = $this->load->view('lister', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */