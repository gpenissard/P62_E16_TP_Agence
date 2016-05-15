'use strict';

const URL_CHANGE_PANIER = 'ajax/panier.php';

$(document).ready(function(){
    console.log('Démarrage');
    maj_statut_panier();
    $(".card_item_qty").change(function(){
        var id = $(this).data('card-item-id');
        var qty = $(this).val();
        console.log('Changement qté article panier');
        var queryString = '?operation=op_maj&id=' + id + '&qty=' + qty;
        console.log(queryString);
        $.ajax({
            url: URL_CHANGE_PANIER + queryString, // Url incluant paramètres de queryString
            type : 'GET', // Méthode HTTP
            async : true, // Requête asynchrone
            dataType : 'json',
            success: function(result){
                console.log('Réponse Ajax');
                console.log(result);
                afficher_panier(result);
            },
            error: function(xhr){
                console.log("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    });
});

function afficher_panier(panier) {
    console.log('Affichage du Panier : ', panier);
    console.log('nb items panier : ', Object.keys(panier).length);
    var nb_items_panier = Object.keys(panier).length;
    var liste = $('#card ul');
    liste.empty();
    if (0 == nb_items_panier) {
        liste.hide();
        $('.card_count').text('vide');
    } else {
        $('.card_count').text(nb_items_panier + ' article' + (nb_items_panier > 1 ? 's' : ''));
        for (var id_article in panier) {
            console.log(id_article);
            $('<li>')
                .data('card-item-id', id_article)
                .html(panier[id_article].name + ', ' + panier[id_article].price + ' (' + panier[id_article].qty + ')')
                .appendTo(liste)
                .append('<img src="css/image/small_red_cross.png" />')
                .click(function(){
                    var id_article = $(this).data('card-item-id');
                    console.log('Suppr item card id : ', id_article);
                    var queryString = '?operation=op_retirer&id=' + id_article;
                    $.ajax({
                        url: URL_CHANGE_PANIER + queryString, // Url incluant paramètres de queryString
                        type : 'GET', // Méthode HTTP
                        async : true, // Requête asynchrone
                        dataType : 'json',
                        success: function(result){
                            console.log('Réponse Ajax');
                            console.log(result);
                            afficher_panier(result);
                            // Si on est justement sur la page détail de l'article que l'on retire du panier
                            // On met à 0 la value d'un champ input de quantité dans le panier
                            $('.card_item_qty').each(function(index){
                                console.log(this);
                                if ($(this).data('card-item-id') == id_article) {
                                    $(this).val(0);
                                }
                            })
                        },
                        error: function(xhr){
                            console.log("An error occured: " + xhr.status + " " + xhr.statusText);
                        }
                    });

                });
        }
        liste.show();
    }
}

function maj_statut_panier() {
    var queryString = '?operation=op_status';
    $.ajax({
        url: URL_CHANGE_PANIER + queryString, // Url incluant paramètres de queryString
        type : 'GET', // Méthode HTTP
        async : true, // Requête asynchrone
        dataType : 'json',
        success: function(result){
            console.log('Réponse Ajax');
            console.log(result);
            afficher_panier(result);
        },
        error: function(xhr){
            console.log("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}