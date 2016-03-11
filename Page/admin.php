<h1>Accueil - Admin</h1>
<pre>
<h3>Comptes</h3>
Ce menu permet de créer les promotions ainsi que les comptes des professeurs et des étudiants. Il est le préalable indispensable à toute utilisation. Le login d'un compte correspond à l'adresse mél de son titulaire ; cette adresse doit être unique et syntaxiquement valide. Son existence réelle n'est requise qu'en cas d'utilisation d'un serveur de messagerie qui transmettra le mot de passe choisi aléatoirement par le système.
Une promotion a logiquement une durée de vie de un an ; elle est identifiée par son nom suivi d'un tiret et des deux derniers chiffres de l'année. Par exemple la promotion sio1b pour l'année 2011 a comme identifiant sio1b-11. Pratiquement, une promotion correspond à une classe ou a un de ses sous-ensembles. Une promotion correspond à un parcours : SISR, SLAM ou indiférencié (premier semestre) ; un étudiant a donc comme parcours celui de sa promotion. Durant une année scolaire, un professeur peut gérer une ou plusieurs promotions, un étudiant n'appartient qu'à une seule promotion. En cas de changement, quelle que soit sa promotion, un étudiant conserve toutes ses données.
<h3>Code d'accès</h3>
Les mots de passe des professeurs et étudiants sont générés par l'application lors de la création des comptes. Ils peuvent être modifiés par l'administrateur aussi bien que par le titulaire du compte.
Si un serveur SMTP est disponible, le mot de passe est envoyé à son titulaire.
S'il n'y a pas de serveur SMTP et que les mots de passe ne sont pas cryptés dans la base (option d'installation), l'administrateur doit fournir ces informations à leurs destinataires à l'aide de la liste proposée pas ce menu.
S'il n'y a pas de serveur SMTP et que les mots de passe sont cryptés dans la base, l'application génère comme mot de passe la chaîne de quatre caractères ABCD pour chaque utilisateur qui devra modifier cette valeur lors de sa première connexion.
<h3>Restauration</h3>
Vous pouvez restaurer les données d'un étudiant à partir de sa sauvegarde XML. Vous pouvez utiliser cette fonctionnalité (également disponible pour les professeurs) pour tous les élèves. Les commentaires des enseignants sont automatiquement restaurés, mais l'identification de leur auteur n'est réalisée que s'ils sont déjà enregistrés.
Pour des étudiants provenant d'autres établissements, vous devez restaurer les données en deux temps : d'abord création d'un nouveau compte étudiant, ensuite restauration des données fournies par celui-ci. Les commentaires apparaitront alors sans indication du professeur qui en est l'auteur.
<h3>Sauvegarde</h3>
L'intégralité de la base de données est sauvegardée sur le serveur web afin de permettre une restauration éventuelle. Il est recommandé de copier cette sauvegarde sur un support externe afin de pallier à une éventuelle panne commune des serveurs web et sql.
</pre>