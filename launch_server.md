# Comment lancer votre serveur pour cette session
Nous allons utiliser ces commandes seulement pour aider au développement d'une application

Lancer votre serveur comme suit:

    $ php -S localhost:8000

Pour permettre un accès à distance vous devez fait un appel sans le localhost qui représente l'adresse ip 127.0.0.1 mais en mettant une adresse spéciale voulant dire de n'importe ou:

    $ php -S 0.0.0.0:8000

Ainsi si votre machine à l'adresse IP 192.168.1.2/24 et que vous êtes sur une machine ayant l'adresse ip 192.168.1.3/24 (sur le même réseau) alors dans votre navigateur vous devriez mettre **192.168.1.2:8000**

Dans le cas ou vous aimeriez avoir un fichier de démarrage (contenant par exemple un routeur) faites ceci:

    $ php -S localhost:8000 router.php