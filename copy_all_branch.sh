#!/bin/bash

# Récupérer les dernières modifications du dépôt distant
git fetch origin

# Boucle sur toutes les branches distantes sauf la branche 'origin/HEAD' (symbole de la branche par défaut)
for branch in $(git branch -r | grep -v '\->' | grep 'origin/' ); do
    # Extraire le nom de la branche à partir de 'origin/'
    branch_name=$(echo $branch | sed 's/origin\///')
    
    # Créer une branche locale basée sur la branche distante
    git checkout -b $branch_name $branch
done
