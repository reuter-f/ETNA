#!/bin/bash
## thelastmatch.sh for lastmatch in /home/faust/Documents/last_match/demich_a/thelastmatch
## 
## Made by REUTER Faustine
## Login   <reuter_f@etna-alternance.net>
## 
## Started on  Wed Jan 11 03:51:54 2017 REUTER Faustine
## Last update Thu Jan 12 15:54:27 2017 REUTER Faustine
##

affichage()
{
    let "z = 0"
    while [ $z -lt ${#tab[@]} ]
    do
	declare -a enlev
	if [ ${tab[$z]} -ne ${tab2[$z]} ]
	then
	    let "enlev[$z] =  tab[$z] - tab2[$z]"
	else
	    let "enlev[$z] =  0"
	fi
	let "z += 1"
    done
	let "taille = ${#tab[@]}"
	let "emplace = ${#tab[@]} - 1"
	let "nbstick = ${tab[$emplace]}"
	let "largeur = $nbstick + 4"
	let "largeurl = $largeur - 1"
       	let "i = 0"
	while [ $i -lt $largeur ]
	do
	    echo -n "*"
	    let "i += 1"
	done
	let "hauteur = 0"
	echo -ne "\n"
	let "i = 0"
	# boucle pour parcourir les lignes
	while [ $hauteur -le $emplace ]
	do
	    if [ $i != 0 ]
	    then
		echo -ne "\n"
	    fi
	    let "d = taille - hauteur"
	    
	    let "i = 0"
	    # boucle pour parcourir les colonnes
	    while [ $i -le $largeur ]
	    do
       		let "g = largeurl - d - enlev[$hauteur]"
		
		if [ $i = 0 -o $i = $largeurl ]
		then
		    echo -n "*"
		elif [ $i -gt $d -a $i  -lt $g ]
		then
		    echo -n "|"
		else
		    echo -n " "
		fi
		let "i += 1"
	    done
	    let "hauteur += 1"
	done
	echo -ne "\n"
	let "i = 0"
	while [ $i -lt $largeur ]
	do
	    echo -n "*"
	    let "i += 1"
	done
	echo -ne "\n"
	
	  
    
    
}

game()
{
    end_game="1"
       
    while [ $end_game != 0 ]
    do
	ok="0"
	while [ $ok != 1 ]
	do
	    echo "Votre tour :"
	    read -p 'Ligne :' ans_line
	    let "ans_line -= 1"
	    let "max = $1 - 1"
	    if [ tab2[$ans_line] = 0 ]
	    then
		echo "Cette ligne est vide"
	    elif [ $ans_line -ge 0 -a $ans_line -le $max ]
	    then	
		read -p "Nombre d'allumettes :" ans_nbr
		if [ ! -z $ans_nbr ]
		then
		    if [ $ans_nbr -gt 0 -a $ans_nbr -le ${tab2[$ans_line]} ]
		    then
			let "tab2[$ans_line] = tab2[ans_line] - ans_nbr"
			ok="1"
			let "ans_line += 1"
			echo "Vous retirez $ans_nbr alumette(s) sur la ligne $ans_line"
		    fi
		fi
	    fi
	done
	affichage
	end_result="2"
	k="0"
	end_game="0"
	while [ $k != ${#tab2[@]} ]
	do
	    let "end_game += tab2[$k]"
	    let "k += 1"
	done
	if [ $end_game != 0 ]
	then
	    n="$1"
	    sticks="0"
	    echo "Tour de l'IA..."
	    while [ $sticks = 0 ]
	    do
		let "line = RANDOM % n"
		sticks=${tab2[$line]}
	    done
	    let "soustract = RANDOM % sticks + 1"
	    let "tab2[line] = tab2[line] - soustract"
	    let "line += 1"
	    echo "L'IA retire $soustract allumette(s) sur la ligne $line"
	    affichage
	    end_result="1" 
	fi
	k="0"
	end_game="0"
        while [ $k != ${#tab2[@]} ]
        do
            let "end_game += tab2[$k]"
            let "k += 1"
        done
    done
    if [ $end_result = 2 ]
    then
	echo "Maintenant vous pouvez voir mon réel pouvoir ! Looser"
	echo -ne "  ________\n /  _____/_____    _____   ____     _______  __ ___________ \n/   \     \__  \  /     \_/ __ \   /  _ \  \/ _/ __ \_  __ \ \n\    \_\  \/ __ \|  Y Y  \  ___/  (  <_> \   /\  ___/|  | \/ \n \______  (____  |__|_|  /\___  >  \____/ \_/  \___  |__| \n        \/     \/      \/     \/                   \/ \n"
	
    else
	echo "Zut ! J'ai perdu..."
	echo -ne "____   ___ __        __                        _ \n\   \ /   |__| _____/  |_ ___________ ___ __  | | \n \   Y   /|  _/ ___\   __/  _ \_  __ <   |  | | | \n  \     / |  \  \___|  |(  <_> |  | \/\___  |  \| \n   \___/  |__|\___  |__| \____/|__|   / ____|  __ \n                  \/                  \/       \/ \n"
    fi
    exit $end_result
}

clear
echo -ne "___________ __              __                   __       _____          __          __\n\__    ___/|  |__   ____   |  | _____    _______/  |_    /     \ _____ _/  |_  ____ |  |__\n  |    |   |  |  \_/ __ \  |  | \__  \  /  ___/\   __\  /  \ /  \\__  \\   __\/ ___\|  |  \ \n  |    |   |   Y  \  ___/  |  |__/ __ \_\___ \  |  |   /    Y    \/ __ \|  | \  \___|   Y  \ \n  |____|   |___|  /\___  > |____(____  /____  > |__|   \____|__  (____  /__|  \___  >___|  /\n                \/     \/            \/     \/                 \/     \/          \/     \/\n"
if [ $# = 0 ]
then
    echo "Erreur: Vous devez donner le nombre de lignes d'allumettes. (ex: ./thelastmatch.sh 2)"
elif [ $1 -gt 1 -a $1 -le 10 ]
then
    declare -a tab
    let "i = 0"
    let "tab[i] = 1"
    let "i += 1"


    
    while [ $i != $1 ]
    do
	let "tab[i] = tab[i - 1] + 2"
	let "i += 1"
    done

    declare -a tab2
    k="0"
    while [ $k != ${#tab[@]} ]
    do
	tab2[$k]=${tab[$k]}
	let "k += 1"
	    done    
    affichage
    game $1
else
    echo "Erreur: Le nombre de lignes d'allumettes doit etre superieur a 1 et inferieur ou egal a 10."
fi
