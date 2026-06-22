=== Fand Product Customizer ===
Contributors: fandevelop
Donate link: https://fan-develop.fr
Étiquettes : WooCommerce, personnalisateur de produits, personnalisation, texte personnalisé, police
Version minimale requise : 6.8
Testé jusqu’à : 7.0
PHP requis : 7.4
Version stable : 1.0.0
Licence : GPL-2.0 ou ultérieure
URI de la licence : https://www.gnu.org/licenses/gpl-2.0.html

Ajoutez un bloc de personnalisation de texte à vos pages produits WooCommerce. Permettez à vos clients de choisir un texte et une police personnalisés, enregistrés directement dans la commande.

== Description ==

**Fand Product Customizer** ajoute un bloc Gutenberg à vos pages produits WooCommerce permettant à vos clients de personnaliser leur commande avec un texte et une police de leur choix.

Le bloc est entièrement dynamique (rendu côté serveur) et s'intègre nativement à WooCommerce : le texte et la police choisis s'affichent dans le panier, le récapitulatif de commande et sont enregistrés dans les détails de la commande dans l'interface d'administration.

**Fonctionnalités clés :**

**Fonctionnalités visibles par le client (interface utilisateur) :**

* Bloc de personnalisation insérable dans n’importe quel modèle de produit WooCommerce

* Champ de saisie de texte avec limite de caractères configurable (par défaut : 15 caractères)

* Aperçu en direct du texte rendu dans la police sélectionnée, en temps réel

* Sélecteur de polices affichant uniquement les polices disponibles pour ce produit

* Validation lors de la soumission du formulaire : empêche l’ajout au panier sans saisie de texte

**Fonctionnalités pour l’administrateur de la boutique (interface d’administration) :**

* Activation ou désactivation du bloc de personnalisation pour chaque produit à l’aide d’une simple case à cocher

* Choix des polices disponibles pour chaque produit

* Gestion native des polices via la bibliothèque de polices WordPress (Apparence > Éditeur > Styles > Polices) : aucune dépendance externe

* Affichage du texte et de la police choisis dans le panier, sous le nom du produit

* Affichage du texte et de la police choisis dans le récapitulatif de la confirmation de commande

* Enregistrement du texte et de la police choisis dans le détail de la commande dans l’interface d’administration WooCommerce

* Aucune connaissance en programmation requise : entièrement configurable via l’interface d’administration WordPress

== Installation ==

= Étape 1 : Installation et activation de l'extension =

1. Téléversez le dossier `fand-product-customizer` dans le répertoire `/wp-content/plugins/`, ou installez-le directement via l'interface d'administration des extensions WordPress (Extensions > Ajouter).

2. Activez l'extension via l'écran **Extensions** de WordPress.

= Étape 2 : Ajouter des polices via la bibliothèque de polices WordPress =

L'extension utilise les polices enregistrées nativement dans WordPress (introduites dans WordPress 6.5).

1. Allez dans **Apparence > Polices**.

2. Importez ou ajoutez les polices que vous souhaitez proposer à vos clients (par exemple, Love, Cardenio Modern, etc.).

3. Une fois ajoutées, les polices apparaîtront automatiquement dans le sélecteur de polices de l'extension.


Étape 3 : Insérer le bloc dans le modèle de produit unique

1. Accédez à **Apparence > Éditeur > Modèles**.

2. Ouvrez le modèle **Produit unique**.

3. Cliquez sur le bouton **+** pour ajouter un bloc et recherchez **Personnalisation de produit**.

4. Insérez le bloc à l'endroit souhaité sur la page produit (recommandé : entre l'extrait du produit et le bouton « Ajouter au panier »).

5. Enregistrez le modèle.

**Remarque :** Cette étape nécessite un thème compatible avec l'édition complète du site (comme Twenty Twenty-Four, Twenty Twenty-Five ou tout autre thème basé sur des blocs). Si votre thème ne prend pas en charge l'édition complète du site, le bloc reste disponible dans l'éditeur Gutenberg classique. Vous pouvez l'insérer directement dans la description du produit ou via un modèle personnalisé à l'aide d'un constructeur de pages compatible avec les blocs. Dans tous les cas, le bloc doit être placé à l'intérieur ou à côté du formulaire « Ajouter au panier » de WooCommerce afin que les données de personnalisation soient correctement transmises avec la commande.

= Étape 4 : Activer le bloc sur chaque produit =

Le bloc s'affichera uniquement sur les produits pour lesquels il a été explicitement activé.

1. Accédez à **Produits** et ouvrez le produit que vous souhaitez configurer.

2. Dans le panneau **Données produit**, accédez à l'onglet **Général**.

3. Cochez **Activer la personnalisation**.

4. Enregistrez le produit.

= Étape 5 : Choisir les polices disponibles par produit =

Chaque produit peut proposer un ensemble de polices différent au client.

1. Sur l'écran de modification du produit, repérez la boîte méta **Polices disponibles pour ce produit** dans la barre latérale droite.

2. Cochez les polices que vous souhaitez proposer pour ce produit.

3. Enregistrez le produit.

Le sélecteur de polices affiché au client n'affichera que les polices que vous avez sélectionnées pour ce produit.

= Fonctionnement côté client =

Une fois configuré, les clients visitant la page produit verront un bloc de personnalisation contenant :

* Un champ de saisie de texte (15 caractères maximum)

* Une zone d'aperçu en direct affichant le texte rendu dans la police sélectionnée en temps réel

* Un sélecteur de polices affichant uniquement les polices compatibles avec ce produit

Lorsque le client ajoute le produit au panier, le texte et la police choisis sont associés à l'article et affichés :

* Sur la **page panier** (sous le nom du produit)

* Dans le **récapitulatif de commande**

* Sur la **page de confirmation de commande**

* Dans le **détail de la commande dans l'interface d'administration** (sous la ligne de produit)

Vous pouvez ainsi visualiser en un coup d'œil, pour chaque commande, la personnalisation exacte demandée par le client (texte et police).

== Foire aux questions ==

= Compatible avec tous les thèmes WooCommerce ? =

Oui, à condition que votre thème prenne en charge l'éditeur de blocs WordPress (thèmes FSE tels que Twenty Twenty-Four, Twenty Twenty-Five, Storefront Block, etc.). Le bloc est inséré dans le modèle de produit unique via l'éditeur de site.

= Puis-je proposer des polices différentes pour différents produits ? =

Oui. Chaque produit dispose de sa propre sélection de polices. Vous pouvez proposer X polices sur un produit et Y polices complètement différente sur un autre.

= Où ajouter des polices ? =

Les polices sont gérées nativement dans WordPress via **Apparence > Éditeur > Styles > Polices**. Toute police ajoutée à cet endroit sera automatiquement disponible dans le sélecteur de polices de l'extension.

= La personnalisation du client est-elle enregistrée dans la commande ? =

Oui. Le texte et la police choisis sont enregistrés en tant que métadonnées de l'article de commande. Ils apparaissent dans le panier, dans l'e-mail de confirmation de commande et dans le détail de la commande dans l'interface d'administration WooCommerce.

= Puis-je limiter le nombre de caractères ? =

Actuellement 
Dans cette version, la limite est fixée à 15 caractères. Cette limite sera configurable pour chaque produit dans une future version Pro.

== Captures d'écran ==

1. Bloc de personnalisation affiché sur la page produit avec aperçu en direct de la police.

2. Sélection de la police dans la boîte méta « Polices disponibles » sur l'écran d'édition du produit.

3. Case à cocher « Personnalisation » dans l'onglet « Général » des données produit.

4. Personnalisation (texte + police) affichée dans le panier sous le nom du produit.

5. Détails de la commande dans l'interface d'administration affichant la personnalisation du client.

== Journal des modifications ==

= 1.0.0 =

* Version initiale.

* Bloc Gutenberg avec texte en direct et aperçu de la police.

* Intégration de la bibliothèque de polices native WordPress.

* Case à cocher d'activation/désactivation par produit.

* Boîte méta de sélection de la police par produit.

* Intégration au panier, au récapitulatif de commande et aux détails de la commande dans l'interface d'administration.

== Avis de mise à jour ==

= 1.0.0 =

Version initiale.