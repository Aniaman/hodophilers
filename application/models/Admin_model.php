<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function tourPackages()
  {
    $this->db->select('a.*,d.*,i.*');
    $this->db->join('destinationdetails d', 'd.destinationId=a.destination');
    $this->db->join('itinerary i', 'i.itinerary_id=a.itineraryTitle');
    $q = $this->db->get('tour_package a');
    return $q->result_array();
  }
}
