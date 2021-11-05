<?php
  include('functions.php');
  //initialize analytics
  require_once __DIR__ . '/vendor/autoload.php';
  $client = new Google_Client();
  $client->setApplicationName("Realtime Analytics");
  $client->setAuthConfig(SERVICE_ACCOUNT);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_Analytics($client);
  if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action=='pages'){
      echo getActivePages($analytics);
    }
    elseif($action=='users'){
      echo getActiveUsers($analytics);
    }
    elseif($action=='devices'){
      echo getDevices($analytics);
    }
    elseif($action=='sources'){
      echo getTrafficSources($analytics);
    }
    else if($action=='countries'){
      echo getCountries($analytics);
    }
    else if($action=='os'){
      echo getOS($analytics);
    }
    else if($action=='browsers'){
      echo getBrowser($analytics);
    }
  }