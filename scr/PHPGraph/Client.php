<?php


namespace codea1\PHPGraph;

use codea1\Telegraph\Account;
use Exception;
use codea1\Telegraph;

class Client
{
    use Methods;

    public ?string $access_token;
    public ?string $author_name;

    /**
     * Initialize the client, you can use an access_token or set an account after by the setAccount method.
     *
     * @param string|null $access_token
     */
    public function __construct(string $access_token = null){
        if(isset($access_token)){
            $this->access_token = $access_token;
            $this->author_name = $this->getAccountInfo(["short_name"])["author_name "] ?? $this->getAccountInfo(["short_name"])["short_name"];
            //print($this->author_name);
        }
    }

    /**
     * Set an Account object as the account used by the client.
     *
     * @param Account $account
     * @throws Exception
     *
     */
    public function setAccount(Account $account){
        if(isset($account->access_token)){
            $this->access_token = $account->access_token;
            $this->author_name = $account->author_name ?? $account->short_name;
        }else{
            throw new Exception("This account object hasn't an access_token, remember that the access_token is only returned by the createAccount and revokeAccessToken methods");
        }
    }

    /**
     * Makes a request to the API, specifying the method and the data.
     * On error returns an exception with the error.
     *
     * @param array $data
     * @param string $method
     * @throws Exception
     *
     */
    public function request(string $method, array $data){
        $response = Utils::curl("https://api.telegra.ph/".$method, $data);
        $decoded = json_decode($response, true);
        if($decoded["ok"] !== true) throw new Exception("There was an API error: ".$decoded["error"]);
        return $decoded["result"];
    }
}

