<?php
session_start();

use RedBean_Facade as R;

require_once './src/model/Utilisateur.php';
require_once './src/Peuplement/Peuplement.php';
require_once './src/redbean/RConf.php';
require_once './src/api/ApiUtilisateur.php';
require_once './src/api/ApiConnexion.php';
require_once './src/api/ApiDocument.php';
require_once './src/api/ApiCompte.php';
require_once './src/api/ApiAction.php';
require_once './src/api/ApiActionDocument.php';
require_once './src/api/ApiCompteRendu.php';
require_once './src/api/ApiActionAction.php';
require_once './src/api/ApiActionMotClef.php';
require_once './src/api/ApiPhase.php';
require_once './src/api/ApiThematiqueConcernee.php';
require_once './src/api/ApiPartenaire.php';
require_once './src/api/ApiIndicateur.php';
require_once './src/api/ApiLog.php';
$app = new \Slim\Slim();

RConf::conf();

ApiConnexion::addHttpRequest($app);
ApiUtilisateur::addHttpRequest($app);
ApiDocument::addHttpRequest($app);
ApiCompte::addHttpRequest($app);
ApiAction::addHttpRequest($app);
ApiActionDocument::addHttpRequest($app);
ApiCompteRendu::addHttpRequest($app);
ApiActionAction::addHttpRequest($app);
ApiActionMotClef::addHttpRequest($app);
ApiPhase::addHttpRequest($app);
ApiThematiqueConcernee::addHttpRequest($app);
ApiPartenaire::addHttpRequest($app);
ApiIndicateur::addHttpRequest($app);
ApiLog::addHttpRequest($app);

//A delete plus tard
$app->get('/resetData', function () use ($app) {
	Peuplement::ResetData();
});

$app->get('/resetUser', function () use ($app) {
	Peuplement::ResetUser();
});

$app->get('/peuplement',function () use ($app){
	Peuplement::populate();
});

$app->post('/getlog', function () use ($app) {
	$injson = json_decode($app->request->getBody());
	return json_encode($injson);
});
	
//Fin Delete


//Fin des fonctions de l'API

$app->run();
