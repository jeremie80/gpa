<html>
	<head>
		<title>Connexion LDAP</title>
		<meta charset = utf-8>
		<link rel='stylesheet' href='style.css' type='text/css' />
	</head>

	<body>
		<center><h3>Formulaire de Connexion</h3></center>
		<table border = 1  >
			<form action="connexion.php" method="POST">
			<tr>
				<td >
					<center>
						<b> Critères de Connexion 
						</b>
					</center>
				</td>
				<td> 
					<center>
						<b>à Remplir
						</b>
					</center>
				</td>
			</tr>
			<tr >
				<td>
					<center>
						<i><label for="samaccountname"><u>Samaccountname: </u></label>
						</i>
					</center>
				</td>		
				<td>
					<center>
						<input id="samaccountname" type="text" name="samaccountname" required/> 
					</center>
				</td>
			</tr>
			<tr>
				<td>
					<center>
						<i><label for="password"><u>Password: </u></label>
						</i>
					</center>
				</td>		
				<td>
					<center>
						<input id="password" type="password" name="password" required/>
					</center>
				</td>
			</tr>
			<tr>
				<td >
					<center>
					</center>
				</td>
				<td >
					<center>
						<input type="submit" name="submit" value="Valider" />
					</center>
				</td>
			</tr>			
			</form>
		</table>
	</body>
</html>