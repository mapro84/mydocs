<?php
namespace src\app\Controller;

use src\app\Entity\Url;
use src\app\Entity\Demo;
use src\Core\DB\Entity;
use src\app\Entity\Item;
use src\Core\Utils\Check;
use src\Core\Utils\Debug;
use src\app\Controller\BOController;

class ItemController extends AppController{
	
	private $skillController;
	
	public function __construct(){
		parent::__construct();
		$this->skillController = new SkillController();
	}

	public function showBySkillId($skill_id, array $messages = []) {
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$items = Item::searchByskillid($skill_id);
		$relatedUrls = $this->getRelatedUrls($items);
		$demos = Item::getDemosBySkillId($skill_id);
		$skill = $this->getSkills(null, $skill_id);
		$entities = array('items' => $items,'demos' => $demos, 'skills'=>$skill, 'relatedUrls'=>$relatedUrls,'messages' => $messages);
		$this->render('items',$entities);
	}

	public function search() {
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$items = Item::search($parameters);
		$relatedUrls = Url::search($parameters['search']);
		$demos = Demo::search($parameters['search']);
		$skills = $this->getSkills($items);
		$openaiResponse = array_key_exists("openaiResearch",$parameters) ? $this->getOpenaiResponse($parameters) : '';
		$googleApiResponse = ''; // array_key_exists("googleResearch",$parameters) ? $this->getGoogleResponse($parameters) : '';
		// Debug::dump($openaiResponse);
		$entities = array('items' => $items,'demos' => $demos, 'openaiResponse' => $openaiResponse,
		                  'googleApiResponse' => $googleApiResponse, 'skills'=>$skills,'relatedUrls'=>$relatedUrls);
		// if(empty($entities['openaiResponse']) && empty($entities['items'])){
		// 	$entities = [];
		// }
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
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 5000);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5000);
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

	  // Debug::dump($openaiResponse);

		if(!empty($openaiResponse['choices'][0]['text'])){
			$formattedResponse = preg_replace('/[^0-99][^\.\.]\.\s/m', '.<br>', $openaiResponse['choices'][0]['text']);
		  $formattedResponse = preg_replace('/;/m', ';<br>', $formattedResponse);
			return $formattedResponse;
		}else{
			return 'NO Result';
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
				$url = array('name' => $item['urlname'],'url' => $item['url'],'id' => $item['url_id'],'skill_id' => $item['skill_id']);
			  array_push($relatedUrls, $url);
			}
		}
		return $relatedUrls;
	}

	public function getSkills(mixed $items = null, int $skill_id = null): array{
		$skills = [];
		if(\is_array($items)){
			foreach($items as $item){
				if(!empty($item['skill_id'])){
					$skill = Entity::find($item['skill_id'],'skill');
					$skills[$skill->id]['logo']  = $skill->logo;
					$skills[$skill->id]['name']  = $skill->name;
					$skills[$skill->id]['id']    = $skill->id;
				}
			}
		}elseif($skill_id){
			$skill = Entity::find($skill_id,'skill');
			$skills[$skill->id]['logo']  = $skill->logo;
			$skills[$skill->id]['name']  = $skill->name;
			$skills[$skill->id]['id']    = $skill->id;
		}

		return $skills;
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
		$result = Entity::insert('item',$parameters);
		$this->messages['info'] = $result  === false ? 'Item added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Item not added' : '';
		$boController = new BOController();
		$boController->show($this->messages);
	}
	
	public function update() {
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$item_id = $parameters['id'];
		$result = Entity::update('item',$parameters);
		$this->messages['info'] = $result  === false ? 'Item updated successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Item not updated' : '';
		$item = Item::find($item_id,'item');
		$this->showBySkillId($item->skill_id, $this->messages);
	}
	
	public function delete(int $item_id){
		$item = Item::find($item_id,'item');
		$skill_id = $item->skill_id;
		Item::deleteBy('demo',$item_id,'item');
		Item::deleteUrlSkillItem($item_id);
		$result = Item::delete('item',$item_id);
		$this->messages['info'] = $result  !== false ? 'Item deleted successfully' : '';
		$this->messages['error'] = $result  === false ? 'Error: Item not deleted' : '';
		$this->showBySkillId($skill_id, $this->messages);
	}
	
}

