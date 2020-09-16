# Book-a-book

Chaque année, au début de l’année, monsieur Spirlet propose aux étudiants d’acheter à un prix avantageux les livres obligatoires du cursus en infographie.

À l’heure qu’il est sa gestion du processus passe par l’utilisation d’une feuille Excel destinée à synthétiser les statuts des commandes et une impression d’un bon de commande à remplir par les étudiants.

Dans le courant de l’année dernière, monsieur Spirlet m’a demandé si il était envisageable de réaliser une application Web afin d’automatiser un peu le processus, d’utiliser moins de papier et de centraliser les informations.

Ce projet a tout à fait le format qui convient pour l’apprentissage des technologies à maîtriser dans le cadre du cours de projets Web. J’ai donc accepté d’en faire un des projets du cours, en plus du PFE et d’un ou deux sites Web, à venir.

L’objectif de cette application est donc permettre à monsieur Spirlet de gérer d’année en année ses réservations et achats de livres par les étudiants.

En tant qu’utilisateur, monsieur Spirlet a naturellement des besoins que votre application doit satisfaire. Et bien entendu, en tant qu’utilisateurs, les étudiants ont également des besoins particuliers.

Monsieur Spirlet doit pouvoir :
gérer son compte (changer son mot de passe, son email, un avatar éventuel) ;
gérer une liste des livres (ajout, modification, suppression) proposés aux étudiants pour une année donnée. Pour chaque ouvrage, il faut idéalement fournir le titre ; l(es) auteur(s) ; détails d’édition (texte libre), la maison d’édition ; l’ISBN ; le prix public ; le prix proposé et une image de la couverture. Lorsqu’il constitue sa liste, il serait également intéressant que monsieur Spirlet voie les exemplaires qui restent de l’année précédente (certains étudiants ne viennent jamais chercher les livres qu’ils commandent…) ;
pour chaque étudiant, gérer l’état de la commande, autrement dit, indiquer le statut des paiements et des livraisons. De ces indications devraient résulter des notifications (par mail typiquement). Voici un exemple de scénario : un étudiant a commandé 6 livres sur les 12 disponibles en tout et a effectué son paiement (les paiements se font par virement bancaire sur le compte de monsieur Spirlet. Il faut donner les informations de virement à l’étudiant). Pour les 6 livres concernés, monsieur Spirlet doit pouvoir noter que le paiement a été fait par l’étudiant. Lorsque monsieur Spirlet reçoit les livres, il doit pouvoir les marquer comme « disponibles » et l’étudiant doit recevoir une notification de cette disponibilité. Quand ce dernier vient emporter ses commandes, monsieur Spirlet peut changer le statut de « disponible » vers « emporté » et l’étudiant reçoit alors une notification récapitulative. On peut aussi imaginer que toutes ces notifications sont envoyées au fur et à mesure des modifications réalisées, étudiant par étudiant, ou alors que monsieur Spirlet puisse « valider et envoyer les notifications » d’un coup.
Monsieur Spirlet souhaite visualiser la liste des commandes d’un coup d’œil. L’accueil de ce projet sera donc un dashboard, une sorte de feuille Excel indiquant le statut de chaque étudiant/livre. Naturellement, ceci doit aussi pouvoir être utilisé sur un téléphone, ce qui présente un défi intéressant en terme d’adaptabilité du design.

Chaque changement de statut doit être associé à un timestamp et ce dernier doit être visible dans l’interface. On pourrait imaginer d’ailleurs de voir le détail d’une commande d’étudiant avec tout son historique.

Je dispose d’une feuille excel d’exemple à vous présenter, afin de mieux appréhender le type d’information nécessaire.

Les étudiants doivent pouvoir :
s’inscrire eux-même dans l’application. Pour ce faire, ils doivent fournir leur nom, leur prénom et leur email. L’email doit être vérifié. Quand un étudiant est inscrit, monsieur Spirlet reçoit un email de notification ;
constituer une commande. Attention, ils peuvent commander un même livre en plusieurs exemplaires. On peut aussi imaginer qu’une commande puisse être constituée en plusieurs fois (un état brouillon…). Quand une commande est constituée, monsieur Spirlet reçoit une notification ;
voir les statuts associés à leur commande.
Les statuts possible pour un couple livre/étudiant sont :

n/a (le livre n’est pas un livre que l’étudiant souhaite acheter)
commandé (préciser le nombre)
payé
disponible
livré
Monsieur Spirlet souhaite visualiser la liste des commandes d’un coup d’œil. L’accueil de ce projet sera donc un dashboard, une sorte de feuille Excel indiquant le statut de chaque étudiant/livre. Naturellement, ceci doit aussi pouvoir être utilisé sur un téléphone, ce qui présente un défi intéressant en terme d’adaptabilité du design.

Chaque changement de statut doit être associé à un timestamp et ce dernier doit être visible dans l’interface. On pourrait imaginer d’ailleurs de voir le détail d’une commande d’étudiant avec tout son historique.


## Pages 
### Pour l'admin 
- *_Vue d'ensemble des commandes_* -> Livres et liste des commandes avec leur statu éditable [Fiche livre][Fiche dudtant][Profil][Deconexion]
- *_Vue d'ensemble des étudiants_* -> Liste des étudiant et idication sur comande en cours de la part de cette étudiant [Fiche dudtant][Profil][Deconexion]
- *_Vue d'ensemble des livres_*  -> Liste des livres [Fiche livre][Profil][Deconexion]
- Fiche d'un étudiant -> Avec historique des livres acheter par celui-ci [Fiche livre][Profil][Deconexion]
- Fiche d'un livre -> Toute les infos sur un livre et l'historique de ses commande + gestion des stoques [Editer livre][Fiche étudiant][Profil][Deconexion]
- Edit d'un livre -> Editions des informations sur le livre [Retour fiche livre][Profil][Deconexion]
- Edit du profil -> Edition des information du compte 

* Les pages en gras sont celles qui sont dans le menu, entre chrochet sont les liens des différents pasges

### Pour l'étudiant 
- Commende -> Page ou l'utilisateur fait sa comande [Commande brouillon][Commande validée][Profil][Deconexion]
- Commande brouillon -> Page ou sont les comande qui peuvent encore être validées [Commande][Commande validée][Profil][Deconexion]
- Commande validé -> Page ou l'étudiant voit le statu de ses commandes, il ne peux plus revenir en arriére [Profil][Deconexion]
- Edit du profil -> Edition des information du compte 

* Entre chrochet sont les liens des différents pasges

### Connexion 
- Connexion -> Connection 
- Création du compte -> Création d'un compte 
