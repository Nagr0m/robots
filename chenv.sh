if [[ $1 ]]; then
	TYPE_ENV=$1
else
	read -p "Precisez l'environement : " TYPE_ENV
fi

if [[ -e "env/env.$TYPE_ENV" ]]; then
	echo "Changement du fichier .env"
	cp env/env.$TYPE_ENV .env
	echo "Fait"
else
	echo "Cet environnement n'existe pas"
fi
