<html>
	<head>
		<title>Connexion LDAP</title>
		<meta charset = utf-8>
		<link rel='stylesheet' href='style.css' type='text/css' />
	</head>
	<body>
<?php
$samaccountname = $_POST["samaccountname"];  //Identifiant
$password = $_POST["password"]; 	//Mot de passe

echo '<h1>Requête de test de LDAP</h1>';
echo '<h2>Connexion :</h2><br />';
$ds=ldap_connect("10.197.102.241","389");  // Ip et portdu serveur LDAP 
echo 'Le résultat de connexion est : ' . $ds . '<br /><br />';

if ($ds) { 
    echo '<h2>Liaison :</h2><br />'; 
	// Premiere connexion donnant accès en lecture seule (compte ayant un droit de connexion).
    $r=ldap_bind($ds,"CN=testldap,CN=Users,DC=reunion,DC=int","Password974"); 
}
 echo 'Le résultat de connexion est ' . $r . '<br /><br />';
	// recherche si l'identifiant que vous tapez est présent dans la BDD du serveur
 	$filter = "(&(objectClass=user)(objectCategory=person)(sn=*)(samaccountname=".$samaccountname."))";
    $sr=ldap_search($ds,"OU=TOUS LES SERVICES PREF,DC=reunion,DC=int",$filter);  
    echo 'Le résultat de la recherche est ' . $sr . '<br />';
	
	// affiche les info des attributs demander
 $info = ldap_get_entries($ds, $sr);
 if(isset($info[0]["dn"])){
	echo $info[0]["dn"];
	// Deuxieme connexion grace à l'identifiant que vous entrez
	$c=ldap_bind($ds,$info[0]["dn"],$password);
 
	echo '<br />Le résultat de connexion est ' . $c . '<br /><br />';
	if($c){
		echo '<u>Bonne identification !</u>';
		echo $info[0]["mail"][0];

	}else{
echo 'taper a nouveau votre mot de passe';
		header('location: formulaire.php');
	}
	
 }else{
	// header('location: formulaire.php');
 }
?>
</body>
</html>