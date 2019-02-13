<?php 

namespace App\Repositories;

class Posts extends GuzzleHttpRequest{

	public function all(){

		return $this->get('posts');
		// $response = $this->client->request('GET',"posts");
		// return json_decode( $response->getBody()->getContents() );
	}

	public function find($id){

		return $this->get("posts/{$id}");
		// $response = $this->client->request('GET',"posts/{$id}");
		// return json_decode( $response->getBody()->getContents() );
	}
	
}

?>