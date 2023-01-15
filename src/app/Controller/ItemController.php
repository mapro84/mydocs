<?php
namespace src\app\Controller;

use src\app\Item;
use src\app\Url;
use src\Core\Utils\Debug;
use src\Core\Utils\Check;
use src\Core\DB\Entity;

class ItemController extends AppController{
	
	private $skillController;
	
	public function __construct(){
		parent::__construct();
		$this->skillController = new SkillController();
	}

	public function showBySkillId($skill_id) {
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$items = Item::searchBySkillId($skill_id);
		$relatedUrls = $this->getRelatedUrls($items);
		$demos = $this->getDemos($items);
		$skillLogos = $this->getLogos($items);
		$entities = array('items' => $items,'demos' => $demos, 'skillLogos'=>$skillLogos,'relatedUrls'=>$relatedUrls);
		if(empty($entities['openaiResponse']) && empty($entities['items'])){
			$entities = [];
		}
		$this->render('items',$entities);
	}

	public function search() {
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$items = Item::search($parameters);
		$relatedUrls = $this->getRelatedUrls($items);
		$demos = $this->getDemos($items);
		$skillLogos = $this->getLogos($items);
		$openaiResponse = array_key_exists("openaiResearch",$parameters) ? $this->getOpenaiResponse($parameters) : '';
		$googleApiResponse = ''; // array_key_exists("googleResearch",$parameters) ? $this->getGoogleResponse($parameters) : '';
		// Debug::dump($openaiResponse);
		$entities = array('items' => $items,'demos' => $demos, 'openaiResponse' => $openaiResponse,
		                  'googleApiResponse' => $googleApiResponse, 'skillLogos'=>$skillLogos,'relatedUrls'=>$relatedUrls);
		if(empty($entities['openaiResponse']) && empty($entities['items'])){
			$entities = [];
		}
		$this->render('items',$entities);
	}

	public function getOpenaiResponse($parameters): string
	{
		$wordToLookFor = $parameters["search"];

		$open_api_key = getenv('open_api_key');
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 500);
		curl_setopt($ch, CURLOPT_TIMEOUT, 500);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Content-type: application/json",
			"Authorization: Bearer $open_api_key"
		)
		);

		$api_params = array(
			'model' => 'text-davinci-003',
			//'prompt' => 'in the field of Information Technology what a ' . $wordToLookFor . ' and how to use it',
			'prompt' => $wordToLookFor,
			'max_tokens' => 4080
		);

		$api_query = json_encode($api_params);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $api_query);

		$api_response = curl_exec($ch);
		curl_close($ch);

		$openaiResponse = json_decode($api_response, true);
    
		if(!empty($openaiResponse['choices'][0]['text'])){
			$formattedResponse = preg_replace('/[^0-99][^\.\.]\.\s/m', '.<br>', $openaiResponse['choices'][0]['text']);
		  $formattedResponse = preg_replace('/;/m', ';<br>', $formattedResponse);
			return $formattedResponse;
		}else{
			return '';
		}
		
	}

	public function getGoogleResponse($parameters): string
	{
		// The address or location to geocode
		$address = "1600 Amphitheatre Parkway, Mountain View, CA";
		// The API endpoint
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . getenv('google_api_key');;
		// Initialize cURL
		$curl = curl_init();
		// Set the URL and other options
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// Make the request
		$response = curl_exec($curl);
		// Close the cURL session
		curl_close($curl);
		// Decode the JSON response
		$result = json_decode($response, true);

		return $result;

	}

  public function getRelatedUrls(mixed $items): array{
		$relatedUrls = [];
		foreach($items as $item){
			if(!empty($item['urlname'])){
				$url = array('urlname' => $item['urlname'],'url' => $item['url']);
			  array_push($relatedUrls, $url);
			}
		}
		return $relatedUrls;
	}

	public function getDemos(mixed $items): array{
		$demos = [];
		foreach($items as $item){
			if(!empty($item['dname'])){
				$demo = array('did' => $item['did'],'dname' => $item['dname'],'ddescription' => $item['ddescription']);
			  array_push($demos, $demo);
			}
		}
		return $demos;
	}

	public function getLogos(mixed $items): array{
		$logos = [];
		foreach($items as $item){
			if(!empty($item['skillid']) && !isset($logos[$item['skillid']])){
			  $logos[$item['skillid']]= $item['logo'];
			}
		}
		return $logos;
	}

	public function show($item_id,$skill_name) {
		$item = Item::find($item_id,'item');
		$demos = Item::findBy('demo',$item_id,'item');
		$urls = Url::findUrlsBy($item_id,'item');
 		$entities = array('item' => $item, 'demos' => $demos,'urls'=>$urls,'skill_name' => $skill_name);
 		$this->render('item',$entities);
	}

	public function add(){
		$parameters = Check::makeSafeAssociativeArray($_POST);
		Entity::insert('item',$parameters);
		$this->skillController->show($parameters['skill_id']);
	}
	
	public function edit() {

		echo 'edit item';
		var_dump($_POST);
	}
	
	public function update() {
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$item_id = $parameters['id'];
		Entity::update('item',$parameters);
		$item = Item::find($item_id,'item');
		$skill = Entity::find($item->skill_id,'skill');
		$items = Entity::findBy('item',$item->skill_id,'skill');
		$entities = array('skill' => $skill, 'items' => $items);
		$this->render('skill',$entities);
	}
	
	public function delete($item_id){
		// TODO check if exists demo & url with item_id
		//Item::deleteBy('demo',$item_id,'item');
		//Item::deleteBy('url',$item_id,'item');
		Item::delete('item',$item_id);
		$notes = Entity::getAll('note');
		$entities = ['notes' => $notes];
		$this->render('home',$entities);
	}
	
}

