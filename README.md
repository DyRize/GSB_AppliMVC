# GSB_AppliMVC
Application GSB pour l'épreuve E4

Après téléchargement du projet, créer un Virtualhost nommé "gsb" pointant directement sur la racine du projet.

Sous Netbeans, faire un clic droit sur le nom du projet > Properties > Run Configuration puis dans Project URL écrire "http://gsb/index.php".

Afin de créer et remplir la base, le script complet "gsb_frais.sql" se trouve sous le dossier sql du projet.

Afin de créer l'utilisateur userGsb, il faut exécuter le script "gsb_user.sql" se trouvant sous le dossier du sql du projet.

L'utilisateur pour se connecter à la base de données est:
  - login: userGsb
  - password: secret

Voici quelques comptes visiteur afin de réaliser des tests:
  - David Andre
    - login: dandre
    - password: oppg5
  - Louis Villechalane
    - login: lvillachane
    - password: jux7g
  - Valérie Eynde
    - login: veynde
    - password: i7sn3
    
Voici quelques comptes comptable afin de réaliser des tests:
  - Perrine Rasca
    - login: prasca
    - password: gsbAdmin
  - Tom Tardivon
    - login: ttardivon
    - password: gsbAdmin
  - Dylan Le Flour
    - login: dleflour
    - password: gsbAdmin

Application Mobile: https://github.com/DyRize/GSB_AppliFrais

Application C#: https://github.com/DyRize/GSB_GestionCloture
