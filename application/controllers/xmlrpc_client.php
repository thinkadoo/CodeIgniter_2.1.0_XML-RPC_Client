<?php

class Xmlrpc_client extends CI_Controller {

    function index()
    {
        $this->load->helper('url');

        $this->load->library('xmlrpc');

        $this->xmlrpc->server('http://localhost/CodeIgniter_2.1.0_XML-RPC_Server/index.php/xmlrpc_server/', 80);
        $this->xmlrpc->method('Greetings');

        $request = array('How is it going?');
        $this->xmlrpc->request($request);

        if ( ! $this->xmlrpc->send_request())
        {
            echo $this->xmlrpc->display_error();
        }
        else
        {
            echo '<pre>';
            print_r($this->xmlrpc->display_response());
            echo '</pre>';
        }
    }
}
