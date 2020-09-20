# Routes 
Note : Les numéro des vues correspondent à des plache sur le fichier XD 

## Dashbord 
Lien : {siteweb}/ 

Méthode : GET

VUES : 

- If Mr Spirler > XD 1 
- else 
    If pas de commande > XD 7, 8, 9
    Esle if brouillon > xD 10
    Else > xD 11


__Form__

changement de statu d'un livre pour de la part de Mr Spirlet sur la vue 1

Lien : {siteweb}/

Méthode : POST


## Connecion
Lien : {siteweb}/connecion

Méthode : GET

Vue : 13


__Form__

Formulaire de connecion

Lien : {siteweb}/

Méthode : POST


## Inscription 
Lien : {siteweb}/inscription

Méthode : GET

Vue : 15

__Form__

formulaire d'inscription

Lien : {siteweb}/confirmation

Méthode : POST


## Confirmation  
Lien : {siteweb}/confirmation

Méthode : GET

Vue : 16

## Edit Profil 
Lien : {siteweb}/profil

Méthode : GET

Vue : 12



## Users list
Lien : {siteweb}/etudients

Méthode : GET

VUE : xD 2


## Book list
Lien : {siteweb}/livres

Méthode : GET

VUE : xD 3


## User 
Lien : {siteweb}/etudiant_{slug}

Méthode : GET

Vue : 4

__Form__
changement de statu d'un livre pour de la part de Mr Spirlet

Lien : {siteweb}/etudiant_{slug}

Méthode : POST


## Book 
Lien : {siteweb}/livre_{slug}

Méthode : GET

Vue : 5

## Book Edit
Lien : {siteweb}/livre_{slud}/edit

Méthode : GET

Vue : 6

__Form__
formulaire de modification d'un livre

Lien : {siteweb}/livre_{slug}

Méthode : POST 


## New book
Lien : {siteweb}/nouveau

Méthode : GET

Vue : 6

__Form__
formulaire d'ajout d'un livre

Lien : {siteweb}/livre_{slug}

Méthode : POST



