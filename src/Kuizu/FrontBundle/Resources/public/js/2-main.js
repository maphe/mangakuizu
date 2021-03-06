$(function(){
    // Récupère le div qui contient la collection de tags
    var collectionHolder = $('#question_answers');

    // ajoute un lien « add an answer »
    var $addAnswerLink = $('<a href="javascript:void(0)" class="add_tag_link">Ajouter une réponse</a>');
    var $newAnswerDiv = $('<div></div>').append($addAnswerLink);

    function addTagForm(collectionHolder, $newAnswerLi) {
        // Récupère l'élément ayant l'attribut data-prototype comme expliqué plus tôt
        var prototype = collectionHolder.attr('data-prototype');

        // Remplace '__name__' dans le HTML du prototype par un nombre basé sur
        // la longueur de la collection courante
        var newForm = prototype.replace(/__name__label__/g, 'Réponse '+collectionHolder.children().length);
        newForm = newForm.replace(/__name__/g, collectionHolder.children().length);

        // Affiche le formulaire dans la page dans un li, avant le lien "ajouter un tag"
        var $newFormDiv = $(newForm);
        $newAnswerLi.before($newFormDiv);
    }

    $(function() {
        // ajoute l'ancre « ajouter un tag » et li à la balise ul
        collectionHolder.append($addAnswerLink);

        $addAnswerLink.on('click', function() {
            // ajoute un nouveau formulaire tag (voir le prochain bloc de code)
            addTagForm(collectionHolder, $addAnswerLink);
        });
    });
});